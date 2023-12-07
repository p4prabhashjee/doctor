<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\ApplyLoan;
use App\Models\ApplyLoanInstallment;
use App\Models\InstallmentTime;
use App\Models\TransactionHistory;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use Carbon\Carbon;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class LoanController extends Controller
{


    public function loan_list(Request $request)
    {

        try {
            $user = auth()->guard('api')->user();
            $data = Loan::where('status', 1)->where('country', $user->country_code)->select('id', 'name', 'description', 'image', 'interest_rate', 'amount_range', 'max_range', 'duration')->orderBy('id', 'DESC')->where(function ($query) use ($request) {

                if (!empty($request['search'])) {
                    $query->where('name', 'LIKE', '%' . $request['search'] . '%');
                }

                if (!empty($request['min'] && !empty($request['max']))) {
                    $query->whereBetween('amount_range', [$request['min'], $request['max']]);
                }
            })->get();
            if (!empty($data)) {
                $success_msg = 'Data Fetach Successfully.';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'data' => $data,
                ], 200);
            } else {
                $error_msg = 'Data Not Found.';
                return response()->json([
                    'message' => $error_msg,
                    'status' => 204,
                    'data' => '',
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }

    public function loan_detail(Request $request)
    {
        $Validatior = Validator::make($request->all(), [
            'loan_id' => 'required',
        ]);

        if ($Validatior->fails()) {
            return back()->withInput()->withErrors($Validatior);
        }
        try {
            $data = Loan::find($request['loan_id']);
            if (!empty($data)) {
                $success_msg = 'Data Fetach Successfully.';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'data' => $data,
                ], 200);
            } else {
                $error_msg = 'Data Not Found.';
                return response()->json([
                    'message' => $error_msg,
                    'status' => 204,
                    'data' => '',
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }

    public function apply_loan(Request $request)
    {
        $Validatior = Validator::make($request->all(), [
            'loan_id' => 'required',
            'loan_amount' => 'required',

        ]);

        if ($Validatior->fails()) {
            return back()->withInput()->withErrors($Validatior);
        }
        try {
            $user = auth()->guard('api')->user();

            $loan = Loan::find($request['loan_id']);

            $intrest_amount = ($request['loan_amount'] * $loan->interest_rate) / 100;
            // $duration = InstallmentTime::find($request['duration_time']);


            $apply_loan = new ApplyLoan;
            $apply_loan->user_id = $user['id'];
            $apply_loan->loan_id = $request['loan_id'];
            $apply_loan->loan_amount = $request['loan_amount'];
            $apply_loan->intrest = $loan->interest_rate;
            $apply_loan->intrest_amount = $intrest_amount;
            $apply_loan->let_fine_intrest = 0;
            $apply_loan->duration_time = $loan->duration;
            $apply_loan->recover_amount = 0;
            $apply_loan->loan_bonuse = $loan->loan_bonus;
            $apply_loan->save();


            $days_add = $loan->duration;
            $duration_time = $loan->installment;


            $installment_amount = ($request['loan_amount'] + $intrest_amount) / $duration_time;
            $loan_amount = $request['loan_amount'] / $duration_time;
            $intrest = $intrest_amount / $duration_time;

            for ($i = 1; $i <= $duration_time; $i++) {
                if ($i == 1) {
                    $pay = 1;
                } else {
                    $pay = 0;
                }

                $oneMonthLater = $apply_loan->created_at->addDays($days_add * $i);

                $dateOnly = $oneMonthLater->format('Y-m-d');
                $instalment = new ApplyLoanInstallment;
                $instalment->apply_loan_id = $apply_loan->id;
                $instalment->loan_id = $request['loan_id'];
                $instalment->user_id = $user->id;
                $instalment->pay_date = $dateOnly;
                $instalment->pay = $pay;
                $instalment->installment_amount = $installment_amount;
                $instalment->loan_amount = $loan_amount;
                $instalment->intrest_amount = $intrest;
                $instalment->let_fine = 0;
                $instalment->final_amount = $installment_amount;
                $instalment->save();
            }

            $data = ApplyLoan::with('get_instalment')->find($apply_loan->id);

            if (!empty($data)) {
                $success_msg = 'Data Fetach Successfully.';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'data' => $data,
                ], 200);
            } else {
                $error_msg = 'Data Not Found.';
                return response()->json([
                    'message' => $error_msg,
                    'status' => 204,
                    'data' => '',
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }

    public function view_apply_loan(Request $request)
    {
        $user = auth()->guard('api')->user();
        if (empty($request['status'])) {
            $data = ApplyLoan::with('get_instalment')->where('user_id', $user->id)->orderBy('id', 'DESC')
                ->where(function ($query) {
                    $query->where('status', 1)->orWhere('status', 3);
                })
                ->get();
        } else {
            $data = ApplyLoan::with('get_instalment')->where('user_id', $user->id)->orderBy('id', 'DESC')->where('status', $request['status'])->get();
        }

        try {
            if (!empty($data)) {
                $success_msg = 'Data Fetach Successfully.';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'data' => $data,
                ], 200);
            } else {
                $error_msg = 'Data Not Found.';
                return response()->json([
                    'message' => $error_msg,
                    'status' => 204,
                    'data' => '',
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }

    public function view_loan_installment(Request $request)
    {
        $user = auth()->guard('api')->user();
        $data = ApplyLoanInstallment::where('apply_loan_id', $request->apply_loan_id)->get();
        $loan_amount = ApplyLoan::find($request->apply_loan_id);
        try {
            if (!empty($data)) {
                $success_msg = 'Data Fetach Successfully.';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'loan_amount' => $loan_amount->loan_amount,
                    'data' => $data,
                ], 200);
            } else {
                $error_msg = 'Data Not Found.';
                return response()->json([
                    'message' => $error_msg,
                    'status' => 204,
                    'data' => '',
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }


    public function installment_paid(Request $request)
    {
        $user = auth()->guard('api')->user();

        try {
            $data = ApplyLoanInstallment::find($request['installment_id']);

            $body = array(
                'ShortCode' => env('MPESA_SHORTCODE'),
                'Msisdn' => '254708374149',
                'Amount' => intval($data->installment_amount),
                'BillRefNumber' => $request->account,
                'CommandID' => 'CustomerPayBillOnline'
            );

            $url = '/c2b/v1/simulate';
            $response = $this->makeHttp($url, $body);
            $responseData = json_decode($response, true);



            if (isset($responseData['ResponseCode']) && $responseData['ResponseCode'] == 0) {
                $tran = new TransactionHistory;
                $tran->user_id = $data->user_id;
                $tran->loan_id = $data->loan_id;
                $tran->apply_loan_id = $data->apply_loan_id;
                $tran->inst_id = $request['installment_id'];
                $tran->tran_type = 2;
                $tran->loan_amount = $data->installment_amount;
                $tran->amount = $data->loan_amount;
                $tran->intrest = $data->intrest_amount;
                $tran->transaction_id = '';
                $tran->tran_status = 'Success';
                $tran->save();

                $data->status = 2;
                $data->save();

                $change_pay = ApplyLoanInstallment::where('apply_loan_id', $data->apply_loan_id)->where('status', 1)->first();
                if (!empty($change_pay)) {
                    $change_pay->pay = 1;
                    $change_pay->save();
                } else {
                    $ApplyLoan = ApplyLoan::find($data->apply_loan_id);
                    $ApplyLoan->status = 4;
                    $ApplyLoan->save();
                }

                $send_token = apiNotificationForApp('em2lqrmJSu-5LvVMqPOnLz:APA91bHfUhjZFqxfhVnZsFg18erE7f6nFbLA670Yr-5oPBf1sB1H99b1MqgjW7FUCj_EOhstOuCUw5PAKKc0UQntk2cOLgSTRDFsRIH1MajbF5YqAXioBQuDvJMjXyCxT35m9J-w_Gqf', 'Notification', 'default_sound.mp3', 'Your Loan Application');

                $success_msg = 'Payment successfull.';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'data' => $data,
                ], 200);
            } else {
                $error_msg = 'Invalid account.';
                return response()->json([
                    'message' => $error_msg,
                    'status' => 400,
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }

    public function pay_all(Request $request)
    {
        $user = auth()->guard('api')->user();

        try {
            $amount = ApplyLoanInstallment::where('apply_loan_id', $request->apply_loan_id)->where('status', 1)->sum('final_amount');
            $data = ApplyLoan::find($request->apply_loan_id);


            $body = array(
                'ShortCode' => env('MPESA_SHORTCODE'),
                'Msisdn' => '254708374149',
                'Amount' => intval($amount),
                'BillRefNumber' => $request->account,
                'CommandID' => 'CustomerPayBillOnline'
            );

            $url = '/c2b/v1/simulate';
            $response = $this->makeHttp($url, $body);
            $responseData = json_decode($response, true);



            if (isset($responseData['ResponseCode']) && $responseData['ResponseCode'] == 0) {
                $tran = new TransactionHistory;
                $tran->user_id = $data->user_id;
                $tran->loan_id = $data->loan_id;
                $tran->apply_loan_id = $data->id;
                $tran->inst_id = 'All';
                $tran->tran_type = 2;
                $tran->loan_amount = $amount;
                $tran->amount = $data->loan_amount;
                $tran->intrest = $data->intrest_amount;
                $tran->transaction_id = '';
                $tran->tran_status = 'Success';
                $tran->save();


                ApplyLoanInstallment::where('apply_loan_id', $request->apply_loan_id)->where('status', 1)->update(['status' => 2]);


                $ApplyLoan = ApplyLoan::find($request->apply_loan_id);
                $ApplyLoan->status = 4;
                $ApplyLoan->save();

                sendnotification(1, $user->id, 'Payment', 'Your remaining amount paid successfully', 'user');
                $firebaseTokens = User::where('id', $user->id)->whereNotNull('users.device_token')->pluck('users.device_token')->first();
                if ($firebaseTokens) {
                    $notification_msg = 'Your remaining amount paid successfully';
                    apiNotificationForApp($firebaseTokens, 'Loan Status', 'default_sound.mp3', $notification_msg, null);
                }


                $success_msg = 'Payment successfull.';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'data' => $ApplyLoan,
                ], 200);
            } else {
                $error_msg = 'Invalid account.';
                return response()->json([
                    'message' => $error_msg,
                    'status' => 400,
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }

    public function transaction_histories(Request $request)
    {
        $user = auth()->guard('api')->user();

        try {
            $data = TransactionHistory::where('user_id', $user->id)->orderBy('id', 'DESC')->get(); {
                $success_msg = 'Data Fetach Successfully.';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'data' => $data,
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }

    public function notification(Request $request)
    {
        $user = auth()->guard('api')->user();
        try {
            $data = Notification::where('resiver_id', $user->id)->where('seen', 1)->orderBy('id', 'DESC')->get(); {
                $success_msg = 'Data Fetach Successfully';
                return response()->json([
                    'message' => $success_msg,
                    'status' => 200,
                    'data' => $data,
                ], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.', 'status' => 500, 'data' => ''], 200);
            exit;
        }
    }
}
