<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\ApplyLoan;
use App\Models\User;
use App\Models\InstallmentTime;
use App\Models\TransactionHistory;
use App\Models\ApplyLoanInstallment;
use App\Models\Country;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DataTables;
use App\Mail\VarifyEmail;
use Mail;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class ApplyLoanController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'View Loan Applications',
            'page_title' => 'View Loan Applications',
        );
        return view('admin.applyloan.view')->with($data);
    }

    public function anydata(Request $request)
    {
        $anydata = [];
        $anydata = ApplyLoan::with('get_loan')->where('status', '<', 5)->orderBy('id', 'DESC')->where(function ($query) use ($request) {
            if (!empty($request['status'])) {
                $query->where('status', $request['status']);
            }
        })
            ->whereHas('get_loan', function ($query) use ($request) {
                if (!empty($request['title'])) {
                    $query->where('name', 'LIKE', '%' . $request['title'] . '%');
                }
            })
            ->get();


        return Datatables::of($anydata)

            ->addColumn('user', function ($anydata) {
                return $anydata['get_user']->name;
            })

            ->addColumn('loan', function ($anydata) {
                return $anydata['get_loan']->name;
            })

            ->addColumn('loan_amount', function ($anydata) {
                $amt = $anydata->loan_amount;
                return '$' . $amt;
            })

            ->addColumn('intrest', function ($anydata) {
                return $anydata->intrest . '%';
            })

            ->addColumn('pay', function ($anydata) {
                $tran = TransactionHistory::where('apply_loan_id', $anydata->id)->whereNot('inst_id')->first();

                if ($anydata->status == 4) {
                    $action = '<button class="btn btn-primary dropdown-toggle btn-sm" type="button">Paid</button>';
                } elseif ($anydata->status == 3) {
                    $action = '<button class="btn btn-primary dropdown-toggle btn-sm" type="button">Pay</button>';
                } elseif ($anydata->status == 1) {
                    $action = '<button class="btn btn-primary dropdown-toggle btn-sm" type="button">Pending</button>';
                } elseif (!empty($tran) && $anydata->status == 2) {
                    $action = '<button class="btn btn-primary dropdown-toggle btn-sm" type="button">Paid</button>';
                } elseif (empty($tran) && $anydata->status == 2) {
                    $action = '<button class="btn btn-primary dropdown-toggle btn-sm" type="button" onclick="payamount(' . $anydata->id . ',1)">Pay</button>';
                }

                return $action;
            })

            ->addColumn('status', function ($anydata) {

                if ($anydata->status == 1) {
                    $text = 'Pending';
                    $color = 'success';
                } elseif ($anydata->status == 2) {
                    $text = 'Approved';
                    $color = 'primary';
                } elseif ($anydata->status == 3) {
                    $text = 'Rejected';
                    $color = 'danger';
                } elseif ($anydata->status == 4) {
                    $text = 'Closed';
                    $color = 'dark';
                }
                if ($anydata->status == 4) {
                    return '<div class="btn-group">
                        <button class="btn btn-' . $color . ' btn-sm" type="button" aria-expanded="false">
                            ' . $text . '</button>';
                } else {
                    return '<div class="btn-group">
                        <button class="btn btn-' . $color . ' dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ' . $text . '<i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" onclick="changeStatus(' . $anydata->id . ',1)">Pending</a>
                            <a class="dropdown-item" href="#" onclick="changeStatus(' . $anydata->id . ',2)">Approved</a>
                            <a class="dropdown-item" onclick="resion(' . $anydata->id . ')" href="#" onclick="changeStatus(' . $anydata->id . ',3)">Rejected</a>
                           
                        </div>
                    </div>';
                }
            })

            ->addColumn('action', function ($anydata) {
                $encrypted_id = get_encrypted_value($anydata->id, true);
                $action = '<a href="' . url('/admin/apply_loan/detail/' . $encrypted_id) . '"><i class="mdi mdi-eye text-info" data-original-title="View" data-toggle="tooltip" data-placement="bottom"></i></a>&nbsp;&nbsp;';
                return $action;
            })
            ->rawColumns(['status', 'action', 'user', 'loan', 'pay'])
            ->addIndexColumn()->make(true);
    }

    public function delete(Request $request)
    {
        $id = $request['id'];
        $data = ApplyLoan::find($id);
        if ($data) {
            $data->status = 3;
            $data->save();
            $return_arr = array(
                'status' => 'success',
                'message' => 'Loan Applications Deleted Sussessfully!',
            );
            return response()->json($return_arr);
        }
    }

    public function changeStatus(Request $request)
    {
        $id = $request['id'];
        $status = $request['status'];
        if ($status == 1) {
            $text = 'Pending';
        } elseif ($status == 2) {
            $text = 'Approved';
        } elseif ($status == 3) {
            $text = 'Rejected';
        } elseif ($status == 4) {
            $text = 'Closed';
        }
        $data = ApplyLoan::find($id);
        $user = User::find($data->user_id);
        if ($data) {
            $data->status = $status;
            $data->save();

            sendnotification(1, $data->user_id, 'Loan Status', 'Your Loan Application ' . $text, 'user');
            $firebaseTokens = User::where('id', $data->user_id)->whereNotNull('users.device_token')->pluck('users.device_token')->first();
            if ($firebaseTokens) {
                $notification_msg = 'Your Loan Application ' . $text;
                $send_token = apiNotificationForApp($firebaseTokens, 'Loan Status', 'default_sound.mp3', $notification_msg, null);
            }

            $message = [
                'user_name' => $user->name,
                'message' => 'Your Loan Application ' . $text,
            ];
            Mail::to($user->email)->send(new VarifyEmail($message));

            echo "Success";
        }
    }

    public function resion_save(Request $request)
    {
        $id = $request['apply_id'];
        $reason = $request['reason'];
        $text = 'Rejected';


        $data = ApplyLoan::find($id);
        if ($data) {
            $data->status = 3;
            $data->reason = $reason;
            $data->save();

            sendnotification(1, $data->user_id, 'Loan Status', 'Your Loan Application ' . $text . '.<br>Rreason =' . $reason, 'user');
            $firebaseTokens = User::where('id', $data->user_id)->whereNotNull('users.device_token')->pluck('users.device_token')->first();
            $notification_msg = 'Your Loan Application ' . $text . '.<br>Rreason =' . $reason;
            if ($firebaseTokens) {

                apiNotificationForApp($firebaseTokens, 'Loan Status', 'default_sound.mp3', $notification_msg, null);
            }
            $user = User::find($data->user_id);
            $mailData = [
                'user_name' => $user->name,
                'message' => $notification_msg,
            ];
            Mail::to($user->email)->send(new VarifyEmail($mailData));

            echo "Success";
        }
    }

    public function detail(Request $request, $id)
    {
        $decrypted_id = get_decrypted_value($id, true);

        $data = ApplyLoan::with('get_user', 'get_loan', 'get_instalment', 'get_duration')->find($decrypted_id);


        $data = array(
            'title' => $data->name,
            'page_title' => 'View Loan Application detail',
            'data' => $data,

        );
        return view('admin.applyloan.detail')->with($data);
    }

    public function payamount(Request $request)
    {
        try {
            $id = $request['id'];
            $data = ApplyLoan::find($id);
            $user = User::find($data->user_id);

            // $curl_post_data = array(
            //     'InitiatorName' => env('MPESA_B2C_INITIATOR'),
            //     'SecurityCredential' => 'EsJocK7+NjqZPC3I3EO+TbvS+xVb9TymWwaKABoaZr/Z/n0UysSs..',
            //     'CommandID' => 'SalaryPayment',
            //     'Amount' => 10,
            //     'PartyA' => env('MPESA_SHORTCODE'),
            //     'PartyB' => '254728762287',
            //     'Remarks' => 'Pay',
            //     'QueueTimeOutURL' => env('MPESA_TEST_URL') . '/b2ctimeout',
            //     'ResultURL' => env('MPESA_TEST_URL') . '/b2ccallback',
            //     'Occasion' => 'Occasion'
            // );

            // $res = $this->makeHttp('/b2c/v1/paymentrequest', $curl_post_data);
            // $responseData = json_decode($res, true);

            $responseData['ResponseCode'] = 0;

            if (isset($responseData['ResponseCode']) && $responseData['ResponseCode'] == 0) {

                $tran = new TransactionHistory;
                $tran->user_id = $data->user_id;
                $tran->loan_id = $data->loan_id;
                $tran->apply_loan_id = $data->id;
                $tran->inst_id = '';
                $tran->tran_type = 1;
                $tran->loan_amount = $data->loan_amount;
                $tran->transaction_id = '';
                $tran->tran_status = 'Success';
                $tran->save();

                sendnotification(1, $data->user_id, 'Loan Status', 'Loan Amount Received', 'user');

                return response()->json([
                    'message' => 'Amount pay sussessfully',
                    'status' => 'Success',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Amount not pay sussessfully',
                    'status' => 'Failed',
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }

    public function transaction_histories()
    {
        $data = array(
            'title' => 'View transaction histories',
            'page_title' => 'View transaction histories',
        );
        return view('admin.applyloan.view_transaction_histories')->with($data);
    }

    public function transaction_histories_data(Request $request)
    {
        $anydata = [];
        $anydata = TransactionHistory::with('get_user')->orderBy('id', 'DESC')->where(function ($query) use ($request) {



            if (!empty($request->input('date_from')) && !empty($request->input('date_to'))) {
                $fr_date = date("Y-m-d", strtotime($request->input('date_from')));
                $to_date = date("Y-m-d", strtotime($request->input('date_to')));

                $query = $query->where('created_at', '>=', $fr_date);
                $query = $query->where('created_at', '<=', $to_date);
            } elseif (!empty($request->input('date_from'))) {
                $condate = date("Y-m-d", strtotime($request->input('date_from')));
                $query->where('created_at', 'LIKE', '%' . $condate . '%');
            } elseif (!empty($request->input('date_to'))) {
                $condate = date("Y-m-d", strtotime($request->input('date_to')));
                $query->where('created_at', 'LIKE', '%' . $condate . '%');
            }
        })
            ->whereHas('get_user', function ($query1) use ($request) {
                if (!empty($request['title'])) {
                    $query1->where('name', 'LIKE', '%' . $request['title'] . '%');
                }
            })->get();


        return Datatables::of($anydata)

            ->addColumn('user', function ($anydata) {
                return $anydata['get_user']->name;
            })

            ->addColumn('installment', function ($anydata) {
                $inst = ApplyLoanInstallment::where('apply_loan_id', $anydata->apply_loan_id)->pluck('id')->toArray();
                $position = array_search($anydata->inst_id, $inst);

                return $position + 1 . ' Installment';
            })

            ->addColumn('amount', function ($anydata) {
                if ($anydata['tran_type'] == 1) {
                    return '<span style="color:red;">- $' . $anydata['loan_amount'] . '</span>';
                } else {
                    return '<span style="color:green;">+ $' . $anydata['loan_amount'] . '</span>';
                }
            })

            ->addColumn('date', function ($anydata) {
                return date('h:i A,D d M Y', strtotime($anydata->created_at));
            })


            ->rawColumns(['user', 'amount', 'installment', 'date'])
            ->addIndexColumn()->make(true);
    }
}
