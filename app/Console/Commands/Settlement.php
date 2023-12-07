<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ApplyLoan;
use App\Models\ApplyLoanInstallment;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Notification;

class Settlement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settlement:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate = Carbon::now();
        
        $ApplyLoan = ApplyLoan::with('get_loan')->where('status',2)->get();
        foreach ($ApplyLoan as $value) {
            $inst = ApplyLoanInstallment::where('status',1)->where('apply_loan_id',$value['id'])->get();
            foreach ($inst as $key => $loan_inst) {
                
                $oneMonthLater = $loan_inst->created_at->addMonth($key+1);
                $threeDaysAgo = $oneMonthLater->subDays(3);
                if ($currentDate->isSameDay($threeDaysAgo)) {
                    $fullMonthName = $oneMonthLater->format('F');

                    $notify = new Notification;
                    $notify->sender_id      = $sender_id;
                    $notify->resiver_id     = $resiver_id;
                    $notify->title          = $title;
                    $notify->message        = $message;
                    $notify->sender_type    = $type;
                    $notify->pay            = 1;
                    $notify->installment_id = $loan_inst->id;
                    $notify->amount         = $loan_inst->final_amount;
                    $notify->seen           = 1;
                    $notify->save();

                    $firebaseTokens  = User::where('id',$loan_inst->user_id)->whereNotNull('users.device_token')->pluck('users.device_token')->first();
                    if($firebaseTokens){
                        $notification_msg = 'Your Loan Due In '.$fullMonthName;
                        $send_token = apiNotificationForApp($firebaseTokens, 'Loan Reminder', null, $notification_msg);
                    }
                }
                if ($currentDate->isSameDay($oneMonthLater)) {
                    $fullMonthName = $oneMonthLater->format('F');

                    $notify = new Notification;
                    $notify->sender_id      = $sender_id;
                    $notify->resiver_id     = $resiver_id;
                    $notify->title          = $title;
                    $notify->message        = $message;
                    $notify->sender_type    = $type;
                    $notify->pay            = 1;
                    $notify->installment_id = $loan_inst->id;
                    $notify->amount         = $loan_inst->final_amount;
                    $notify->seen           = 1;
                    $notify->save();

                    $firebaseTokens  = User::where('id',$loan_inst->user_id)->whereNotNull('users.device_token')->pluck('users.device_token')->first();
                    if($firebaseTokens){
                        $notification_msg = 'Your Loan Due In '.$fullMonthName;
                        $send_token = apiNotificationForApp($firebaseTokens, 'Loan Reminder', null, $notification_msg);
                    }
                    
                }
                
                if ($currentDate->greaterThan($oneMonthLater) && $loan_inst->status == 1) {
                    if (empty($loan_inst->one_time_add)) {
                        $loan_inst->one_time_add = ($value['get_loan']->late_extension_interest*$value->loan_amount+$value['intrest_amount'])/100;
                        $loan_inst->final_amount = $loan_inst->one_time_add+$loan_inst->final_amount;
                        $loan_inst->save();

                    }
                    $loan_inst->let_fine = $loan_inst->let_fine+$value['intrest_amount'];
                    $loan_inst->final_amount = $loan_inst->final_amount+$value['intrest_amount'];
                    $loan_inst->save();
                } 
            }
        }  
    }
}

