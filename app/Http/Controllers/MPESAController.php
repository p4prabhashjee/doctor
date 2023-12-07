<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Mpesa;

class MPESAController extends Controller
{
    
    public function getAccessToken()
    {
        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($url);
       
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
            )
        );
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
       
        // return $response;
        return $response['access_token'];
    }

    public function b2cRequest(Request $request)
    {
        $curl_post_data = array(
            'InitiatorName' => env('MPESA_B2C_INITIATOR'),
            'SecurityCredential' => 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
            'CommandID' => 'SalaryPayment',
            'Amount' => 10,
            'PartyA' => '600426',
            'PartyB' => '600000',
            'Remarks' => $request->remarks,
            'QueueTimeOutURL' => env('MPESA_TEST_URL').'/mpesaLaravel/api/b2ctimeout',
            'ResultURL' => env('MPESA_TEST_URL').'/mpesaLaravel/api/b2ccallback',
            'Occasion' => $request->occasion
          );

        $res = $this->makeHttp('/b2c/v1/paymentrequest', $curl_post_data);

        return $res;
    }


    /**
     * Register URL
     */
    public function registerURLS()
    {
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => env('MPESA_TEST_URL') . '/api/confirmation',
            'ValidationURL' => env('MPESA_TEST_URL') . '/api/validation'
        );

        $url = '/c2b/v1/registerurl';
        $response = $this->makeHttp($url, $body);

        return $response;
    }

    public function stkPush(Request $request)
    {
        $timestamp = date('YmdHis');
        $password = env('MPESA_STK_SHORTCODE').env('MPESA_PASSKEY').$timestamp;

        $curl_post_data = array(
            'BusinessShortCode' => '174379',
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => '254708374149',
            'PartyB' => '174379',
            'PhoneNumber' => '254708374149',
            'CallBackURL' => env('MPESA_TEST_URL').'/stkpush',
            'AccountReference' => 'Test',
            'TransactionDesc' => 'Test'
          );

        $url = '/stkpush/v1/processrequest';

        $response = $this->makeHttp($url, $curl_post_data);
        return $response;
    }

    /**
     * Simulate Transaction
     */
    public function simulateTransaction(Request $request)
    {
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'Msisdn' => '254708374149',
            'Amount' => $request->amount,
            'BillRefNumber' => $request->account,
            'CommandID' => 'CustomerPayBillOnline'
        );

        $url =  '/c2b/v1/simulate';
        $response = $this->makeHttp($url, $body);

        return $response;
    }

    /**
     * Transaction status API
     */
    public function transactionStatus(Request $request)
    {
        $body =  array(
            'Initiator' => 'testapiuser',
            'SecurityCredential' => 'ClONZiMYBpc65lmpJ7nvnrDmUe0WvHvA5QbOsPjEo92B6IGFwDdvdeJIFL0kgwsEKWu6SQKG4ZZUxjC',
            'CommandID' => 'TransactionStatusQuery',
            'TransactionID' => 'NEF61H8J60',
            'PartyA' => '600782',
            'IdentifierType' => '4',
            'ResultURL' => env('MPESA_TEST_URL').'/transaction-status/result_url',
            'QueueTimeOutURL' => env('MPESA_TEST_URL').'/transaction-status/timeout_url',
            'Remarks' => 'CheckTransaction',
            'Occasion' => 'VerifyTransaction'
          );

        $url =  'transactionstatus/v1/query';
        $response = $this->makeHttp($url, $body);

        return $response;
    }


    public function reverseTransaction(Request $request){
        $body = array(
            'Initiator' => env('MPESA_B2C_INITIATOR'),
            'SecurityCredential' => env('MPESA_B2C_PASSWORD'),
            'CommandID' => 'TransactionReversal',
            'TransactionID' => $request->transactionid,
            'Amount' => $request->amount,
            'ReceiverParty' => env('MPESA_SHORTCODE'),
            'RecieverIdentifierType' => '11',
            'ResultURL' => env('MPESA_TEST_URL') . '/api/reversal/result_url',
            'QueueTimeOutURL' => env('MPESA_TEST_URL') . '/api/reversal/timeout_url',
            'Remarks' => 'ReversalRequest',
            'Occasion' => 'ErroneousPayment'
          );

          $url =  'reversal/v1/request';
          $response = $this->makeHttp($url, $body);
  
          return $response;
    }


    public function makeHttp($url, $body)
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa' . $url;
        // p($url);
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                    CURLOPT_URL => $url,
                    CURLOPT_HTTPHEADER => array('Content-Type:application/json','Authorization:Bearer '. $this->getAccessToken()),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => json_encode($body)
                )
        );
        $curl_response = curl_exec($curl);
        // p($curl_response);
        curl_close($curl);
        return $curl_response;
    }
}
