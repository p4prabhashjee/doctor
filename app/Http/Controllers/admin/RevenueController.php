<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Country;
use App\Models\ApplyLoan;
use App\Models\InstallmentTime;
use App\Models\TransactionHistory;
use App\Models\ApplyLoanInstallment;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class RevenueController extends Controller
{
    public function index()
    {
        $country = Country::get();
        $data = array(
            'title' => 'View Reports & Statistics',
            'page_title' => 'View Reports & Statistics',
            'country' => $country,
        );
        return view('admin.revenue')->with($data);
    }

    public function anydata(Request $request)
    {
        $anydata = [];
        $anydata = ApplyLoan::with('get_loan', 'get_user')->where('status', '<', 5)->orderBy('id', 'DESC')->where(function ($query) use ($request) {


            if (!empty($request['status'])) {

                $query->where('status', $request['status']);
            }
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
                if (!empty($request['user_name'])) {
                    $query1->where('name', 'LIKE', '%' . $request['user_name'] . '%');
                }
                if (!empty($request['email'])) {
                    $query1->where('email', $request['email']);
                }
                if (!empty($request['mob_no'])) {
                    $query1->where('mobile', $request['mob_no']);
                }
            })
            ->whereHas('get_user', function ($query1) use ($request) {
                if (!empty($request['user_name'])) {
                    $query1->where('name', 'LIKE', '%' . $request['user_name'] . '%');
                }
                if (!empty($request['email'])) {
                    $query1->where('email', $request['email']);
                }
                if (!empty($request['mob_no'])) {
                    $query1->where('mobile', $request['mob_no']);
                }
            })->get();

        return Datatables::of($anydata)

            ->addColumn('user', function ($anydata) {
                return $anydata['get_user']->name;
            })

            ->addColumn('mobile', function ($anydata) {
                return $anydata['get_user']->mobile;
            })

            ->addColumn('loan', function ($anydata) {
                return $anydata['get_loan']->name;
            })
            ->addColumn('loan_amount', function ($anydata) {
                $amt = $anydata->loan_amount;
                return '$' . $amt;
            })
            ->addColumn('intrest_amount', function ($anydata) {
                $amt = $anydata->intrest_amount;
                return '$' . $amt;
            })

            ->addColumn('intrest', function ($anydata) {
                return $anydata->intrest . '%';
            })

            ->addColumn('total_amount', function ($anydata) {
                $amt = ApplyLoanInstallment::where('apply_loan_id', $anydata->id)->sum('final_amount');
                return '$' . $amt;
            })

            ->addColumn('recover_amount', function ($anydata) {
                $amt = ApplyLoanInstallment::where('apply_loan_id', $anydata->id)->where('status', 2)->sum('final_amount');
                return '$' . round($amt, 2);
            })
            ->addColumn('remaining_amount', function ($anydata) {
                $amt = ApplyLoanInstallment::where('apply_loan_id', $anydata->id)->where('status', 1)->sum('final_amount');
                return '$' . round($amt, 2);
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

                return '<div class="btn-group">
                        <button class="btn btn-' . $color . ' dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ' . $text . '
                        </button>
                    </div>';
            })

            ->addColumn('action', function ($anydata) {
                $encrypted_id = get_encrypted_value($anydata->id, true);
                $action = '<a href="' . url('/admin/apply_loan/detail/' . $encrypted_id) . '"><i class="mdi mdi-eye text-info" data-original-title="View" data-toggle="tooltip" data-placement="bottom"></i></a>&nbsp;&nbsp;';
                return $action;
            })
            ->rawColumns(['status', 'action', 'user', 'loan', 'pay', 'mobile', 'total_amount', 'recover_amount', 'remaining_amount'])
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
                'message' => 'Loan Deleted Sussessfully!',
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
        if ($data) {
            $data->status = $status;
            $data->save();

            sendnotification(1, $data->user_id, 'Loan Status', 'Your Loan Application ' . $text, 'user');

            echo "Success";
        }
    }

    public function detail(Request $request, $id)
    {
        $decrypted_id = get_decrypted_value($id, true);

        $data = ApplyLoan::with('get_user', 'get_loan', 'get_instalment', 'get_duration')->find($decrypted_id);

        // p($user);
        $data = array(
            'title' => $data->name,
            'page_title' => 'View apply loan detail',
            'data' => $data,

        );
        return view('admin.applyloan.detail')->with($data);
    }

    public function payamount(Request $request)
    {
        try {
            $id = $request['id'];
            $data = ApplyLoan::find($id);
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
                'message' => 'Amoutn pay sussessfully',
                'status' => 'Success',
            ], 200);
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
            if (!empty($request['title'])) {
                $query->where('name', 'LIKE', '%' . $request['title'] . '%');
            }

            if (!empty($request['status'])) {
                $query->where('status', $request['status']);
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
                    return '<span style="color:red;">- ' . $anydata['loan_amount'] . '</span>';
                } else {
                    return '<span style="color:green;">+ ' . $anydata['loan_amount'] . '</span>';
                }

            })

            ->addColumn('date', function ($anydata) {
                return date('h:i A,D d M Y', strtotime($anydata->created_at));
            })


            ->rawColumns(['user', 'amount', 'installment', 'date'])
            ->addIndexColumn()->make(true);

    }
}