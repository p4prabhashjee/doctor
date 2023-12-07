<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CommonController;
use App\Http\Controllers\API\LoanController;
use App\Http\Controllers\MPESAController;
use App\Http\Controllers\MPESAResponsesController;

Route::post('validation', [MPESAResponsesController::class, 'validation']);
Route::post('confirmation', [MPESAResponsesController::class, 'confirmation']);
Route::post('stkpush', [MPESAResponsesController::class, 'stkPush']);
Route::post('b2ccallback', [MPESAResponsesController::class, 'b2cCallback']);
Route::post('transaction-status/result_url', [MPESAResponsesController::class, 'transactionStatusResponse']);
Route::post('reversal/result_url', [MPESAResponsesController::class, 'transactionReversal']);



Route::get('privacy-policy', [CommonController::class, 'privacy_policy']);
Route::get('terms-conditions', [CommonController::class, 'terms_conditions']);
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('forgot-password', [UserController::class, 'forgot_password']);
Route::post('match-otp', [UserController::class, 'match_otp']);
Route::post('forgot-match-otp', [UserController::class, 'forgot_match_otp']);
Route::post('resend_otp', [UserController::class, 'resend_otp']);
Route::post('reset-password', [UserController::class, 'reset_password']);
Route::get('country', [CommonController::class, 'country']);

Route::middleware('auth:api')->group(function () {
	Route::group(['middleware' => 'ifnotuser'], function () {
		Route::get('logout', [UserController::class, 'logout']);
		Route::get('delete-account', [UserController::class, 'delete_account']);
		Route::post('/notifications-status', [UserController::class, 'notifications_status']);
		Route::get('user-profile', [UserController::class, 'user_profile']);
		Route::post('edit-profile', [UserController::class, 'update_profile']);
		Route::post('edit-profile-image', [UserController::class, 'update_profile_image']);
		Route::post('change-password', [UserController::class, 'change_password']);
		Route::post('loan_list', [LoanController::class, 'loan_list']);
		Route::post('loan_detail', [LoanController::class, 'loan_detail']);
		Route::post('apply_loan', [LoanController::class, 'apply_loan']);
		Route::post('view_apply_loan', [LoanController::class, 'view_apply_loan']);
		Route::post('view_loan_installment', [LoanController::class, 'view_loan_installment']);
		Route::post('installment_paid', [LoanController::class, 'installment_paid']);
		Route::get('transaction_histories', [LoanController::class, 'transaction_histories']);
		Route::get('notification', [LoanController::class, 'notification']);
		Route::post('pay_all', [LoanController::class, 'pay_all']);
	});
});
