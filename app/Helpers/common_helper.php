<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\UserOtp;
use App\Models\Notification;

function current_location($ip,$lat,$long)
    {
        $currentUserInfo = Location::get($ip);
        // p($currentUserInfo);
        if(isset($currentUserInfo->latitude) && isset($currentUserInfo->longitude) && !empty($lat) && !empty($long)){
           return distance($currentUserInfo->latitude, $currentUserInfo->longitude,$lat,$long,"K");
       }
    }


function p($p,$exit = 1)
{
	echo '<pre>';
	print_r($p);
	echo '</pre>';
	if($exit == 1)
	{
		exit;
	}
}



function get_encrypted_value($key,$encrypt = false){
	$encrypted_key = null;
	if (!empty($key)) {
		if ($encrypt == true) {
			$key = Crypt::encrypt($key);
		}
		$encrypted_key = $key;
	}
	return $encrypted_key;
}

function get_decrypted_value($key, $decrypt = false){
	$decrypted_key = null;
	if (!empty($key)) {
		if ($decrypt == true) {
			$key = Crypt::decrypt($key);
		}
		$decrypted_key = $key;
	}
	return $decrypted_key;
}


//send otp function
function send_otp($mobile){
    $otpnum = rand(111111, 999999);
    $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://2factor.in/API/V1/3565904e-cc65-11ed-81b6-0200cd936042/SMS/".$mobile."/".$otpnum."/Cityroom%20OTP",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);

    if ($err) {
      return 2;
    } else {
       $response;
    }

    $otp_user = UserOtp::where('mobile',$mobile)->first();
    if (!empty($otp_user)) {
        $userotp = UserOtp::find($otp_user->id);
    }else{
        $userotp = new UserOtp;
    }

    $userotp->mobile        = $mobile;
    $userotp->otp           = $otpnum;
    $userotp->save();

    return 1;
}

//send otp function
function send_otp1($mobile){
    $otpnum = rand(1111, 9999);
    $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://2factor.in/API/V1/3565904e-cc65-11ed-81b6-0200cd936042/SMS/".$mobile."/".$otpnum."/Cityroom%20OTP",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return 2;
    } else {
       $response;
    }

    $otp_user = UserOtp::where('mobile',$mobile)->first();
    if (!empty($otp_user)) {
        $userotp = UserOtp::find($otp_user->id);
    }else{
        $userotp = new UserOtp;
    }

    $userotp->mobile        = $mobile;
    $userotp->otp           = $otpnum;
    $userotp->save();

    return 1;
}

/**
     *  Check file exist or not
     * */
    function check_file_exist($file_name, $custome_key,$thumbnail = false, $default_img = false)
    {
        $return_file        = '';
        $config_upload_path = \Config::get('custom.' . $custome_key);
        if($thumbnail == true)
        {
          $path = $config_upload_path['thumb_display_path'];   
        }
        else
        {
         $path =  $config_upload_path['display_path'];     
        }
        if (!empty($file_name))
        {
            if (is_file($path. $file_name))
            {
                $return_file = url($path.$file_name);
            }
            else
            {
             $return_file = url('public/default-image/default.png');   
            }
        }
        return $return_file;
    }



    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
      if (($lat1 == $lat2) && ($lon1 == $lon2)  && (empty($lon1) || empty($lon2))) {
        return 0;
      }
      else {
        $theta = $lon1-$lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
          return number_format(($miles * 1.609344),2);
        } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
          return $miles;
        }
      }
    }

    function sendnotification($sender_id,$resiver_id, $title, $message, $type){
        $data = new Notification;
        $data->sender_id = $sender_id;
        $data->resiver_id = $resiver_id;
        $data->title = $title;
        $data->message = $message;
        $data->sender_type = $type;
        $data->seen = 1;
        $data->save();
        return true;  
    }


    //Send Firebase Notification to User using App
    function apiNotificationForApp($token, $title, $type = null, $description = null){
    $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $fcmNotification = [
            "to" => $token,
            "notification" => [
                "title"      => $title,
                "body"       => $description,
                "type"       => $type
            ],
            'data' => [
                "extra_data" => 'asd',
                 "title"      => $title,
                "body"       => $description,
                "type"       => $type
                
            ]
        ];   

    $headers = [
        'Authorization:key=AAAA8br0QXQ:APA91bEL7bh-1igyftfZEJRbvpA5AdVoxm6VTClbuGXeB65eNGgdQ7rWzmxSyAB3dRTycFojPy8-_ZYcPY1vcgAjDpmeYFUuP8DKySb1PzfqDOSBTrr9-SSpfozMNsUW2_-HG1DK3Ge6',
        'Content-Type: application/json'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$fcmUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    $result = curl_exec($ch);
    // p($result);
    curl_close($ch);
    return true;
}

    
    
?>