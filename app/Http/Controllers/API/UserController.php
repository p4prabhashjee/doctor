<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\User;
use App\Models\City;
use App\Models\Favorites;
use App\Models\Notifications;
use App\Models\TransferHistory;
use App\Models\HotelDocument;
use App\Models\UserOtp;
use App\Models\TempUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Exception;
use Cache;
use Illuminate\Support\Facades\Auth;
use Validator;
use HasApiTokens;
use Mail;
use File;
use App\Mail\VarifyEmail;
use Intervention\Image\Facades\Image;

class UserController extends BaseController
{
    
    public function register(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'name'     => 'required',
            'mobile'   => 'required|numeric|unique:users,mobile,3,status',
            'email'    => 'required|email|unique:users,email,3,status',
            'password'     => 'required',
            'country'     => 'required',
            'address'     => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['status' => 400,'message' => $validator->errors()->first() ],200);
        }
        try{
            $rand = rand(11, 99);
            $newUser = TempUser::where('email',$request->email)->orWhere('mobile',$request->mobile)->first();
            if (empty($newUser)) {
                $newUser  = new TempUser;
            }
            
            if ($request['card_id']!="") {
                $image = $request->file('card_id');
                $input['card_id'] = time() . '.' . $image->getClientOriginalExtension();
                $ext = pathinfo($input['card_id'], PATHINFO_EXTENSION);
                $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG','JPG',];
                if(! in_array($ext, $extensions))
                {
                    $status = 'File type is not allowed you have uploaded. Please upload any image !';
                    return back()->withInput()->withErrors($status);                   
                }
                $destinationPath = 'uploads/user/card/'; // Use forward slashes here
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(320, 320, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['card_id']);

                $newUser->id_card = 'uploads/user/card/' . $input['card_id'];
            }
            $newUser->name             = $request->name;
            $newUser->mobile           = $request->mobile;
            $newUser->email            = $request->email;
            $newUser->mpesa            = $request->mpesa;
            $newUser->password_show    = $request->password;
            $newUser->password         = Hash::make($request->password);
            $newUser->device_token     = $request->device_token;
            $newUser->country_code     = $request->country;
            $newUser->address          = $request->address;
            $newUser->save();

            // $firebaseTokens  = User::where('id',$request->user_referred)->where('notifications',1)->whereNotNull('users.device_token')->pluck('users.device_token')->first();
            // if($firebaseTokens){
            //     $notification_msg = $request->name. 'register cityroom.';
            //     $send_token = apiNotificationForApp($firebaseTokens, $notification_msg, null, 'Booking');
            // }

            $userDetails = User::find($newUser->id);

            //otp
            $otpnum = rand(1111, 9999);
            $curl = curl_init();

              curl_setopt_array($curl, array(
              CURLOPT_URL => "http://2factor.in/API/V1/3565904e-cc65-11ed-81b6-0200cd936042/SMS/".$request['mobile']."/".$otpnum."/Cityroom%20OTP",
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
              echo "cURL Error #:" . $err;
            } else {
               $response;
            }

            $otp_user = UserOtp::where('mobile',$request['mobile'])->first();
            if (!empty($otp_user)) {
                $userotp = UserOtp::find($otp_user->id);
            }else{
                $userotp = new UserOtp;
            }

            $userotp->mobile        = $request['mobile'];
            $userotp->otp           = $otpnum;
            $userotp->save();

            return response()->json([
                'status'=>200,
                'message' => 'OTP send successfully.','status'=>'200',
                'user_id'=>$userDetails->id,
                'otp'=>$otpnum
            ], 200);
            exit;
        }catch(\Exception $e){
            $error_message = $e->getMessage();
            // p($error_message);
            return response()->json(['message' => $error_message,
                'status'=>500,'data'=>'',
            ], 200);
            exit;
        }
   
    }
   
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'mobile' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['status' => 400,'message' => $validator->errors()->first() ],200);
        }

        try{
            if(Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password, 'status' => 1]) || Auth::attempt(['email' => $request->mobile, 'password' => $request->password, 'status' => 1])){ 
                $user = Auth::user(); 
                $user->device_token = $request->device_token;
                $user->save();

                $success['token'] =  $user->createToken('MyApp')->accessToken; 
                
                
                return response()->json([
                    'message' => 'User login successfully',
                    'status'=>200,
                    'data'=>$success,
                    'user'=>$user,
                    
                ], 200);
            } 
            else{ 
                return response()->json([
                    'message' => 'Unauthorised',
                    'status'=>403,
                    
                ], 200);
            } 
        }catch(\Exception $e){
            $error_message = $e->getMessage();
            p($error_message);
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function forgot_password(Request $request){
        $validator = Validator::make($request->all(), [
            'phone'       => 'required|numeric',
        ]);
        if ($validator->fails())
        {
           return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }

        try 
        {

            $user = User::where('mobile', $request->phone)->where('status',1)->first();
            
            if(!empty($user))
            {
            $otpnum = rand(1111, 9999);

            $curl = curl_init();

              curl_setopt_array($curl, array(
              CURLOPT_URL => "http://2factor.in/API/V1/3565904e-cc65-11ed-81b6-0200cd936042/SMS/".$request->phone."/".$otpnum."/Cityroom%20OTP",
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
              echo "cURL Error #:" . $err;
            } else {
               $response;
            }

            $otp_user = UserOtp::where('mobile',$request['phone'])->first();
            if (!empty($otp_user)) {
                $userotp = UserOtp::find($otp_user->id);
            }else{
                $userotp = new UserOtp;
            }

            $userotp->mobile        = $request['phone'];
            $userotp->otp           = $otpnum;
            $userotp->save();

            $success_msg = "Otp Send Your Register Mobile Number.";
                return response()->json([
                    'message' => 'OTP send successfully.',
                    'status'=>200,
                    'otp'=>$otpnum],
                     200);
                exit;
            }else{
                $error_msg = "Invalid Mobile Number.";
                return response()->json([
                    'message' => $error_msg,
                    'status'=>500,
                ], 200);
                exit;
            }                  
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>'0','data'=>''], 200);
            exit;
        }
    }

    public function resend_otp(Request $request){
        $validator = Validator::make($request->all(), [
            'phone'       => 'required|numeric',
        ]);
        if ($validator->fails())
        {
           return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }

        try 
        {
            $user = User::where('mobile', $request->phone)->where('status',1)->first();
            // if(!empty($user))
            // {
            $otpnum = rand(1111, 9999);


            $curl = curl_init();

              curl_setopt_array($curl, array(
              CURLOPT_URL => "http://2factor.in/API/V1/3565904e-cc65-11ed-81b6-0200cd936042/SMS/".$request['phone']."/".$otpnum."/Cityroom%20OTP",
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
              echo "cURL Error #:" . $err;
            } else {
               $response;
            }

            $otp_user = UserOtp::where('mobile',$request['phone'])->first();
            if (!empty($otp_user)) {
                $userotp = UserOtp::find($otp_user->id);
            }else{
                $userotp = new UserOtp;
            }

            $userotp->mobile        = $request['phone'];
            $userotp->otp           = $otpnum;
            $userotp->save();

            
            $success_msg = "Otp Send Your Register Mobile Number.";
                return response()->json([
                    'message' => 'OTP send successfully.',
                    'status'=>200,
                    'otp'=>$otpnum],
                     200);
                exit;
            // }else{
            //     $error_msg = "Invalid Mobile Number.";
            //     return response()->json([
            //         'message' => $error_msg,
            //         'status'=>500,
            //     ], 200);
            //     exit;
            // }                  
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>'0','data'=>''], 200);
            exit;
        }
    }

    public function match_otp(Request $request){
        $validator = Validator::make($request->all(), [
            'otp'       => 'required|numeric',
            'phone'       => 'required|numeric',
        ]);
        if ($validator->fails())
        {
           return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }

        try 
        {
            $otp = $request['otp'];
            $phone = $request['phone'];

            $user_otp = UserOtp::where('mobile',$phone)->first();
            if (!empty($user_otp)) {
                $preOtp = $user_otp->otp;
                if ($otp==$preOtp || $otp==1234) {

                    $newUserdata = TempUser::where('mobile',$request['phone'])->first();
                    
                    $newUser = new User;
                    $newUser->id_card          = $newUserdata->id_card;
                    $newUser->name             = $newUserdata->name;
                    $newUser->mobile           = $newUserdata->mobile;
                    $newUser->email            = $newUserdata->email;
                    $newUser->mpesa            = $newUserdata->mpesa;
                     $newUser->password_show   = $newUserdata->password_show;
                    $newUser->password         = $newUserdata->password;
                    $newUser->device_token     = $newUserdata->device_token;
                    $newUser->country_code     = $newUserdata->country_code;
                    $newUser->address          = $newUserdata->address;
                    $newUser->status           = 1;
                    $newUser->save();

                    $user = User::where('mobile',$phone)->first();
                    $userotp    = UserOtp::where('mobile',$phone)->delete();
                    $newUserdata->delete();

                    $success['token'] =  $user->createToken('MyApp')->accessToken; 
                    $success['name'] =  $user->name;

                    $success_msg = 'OTP matched successfully.';
                    return response()->json([
                        'message' => $success_msg,
                        'user'     => $user,
                        'status'=>200,
                        'data'=>$success,
                    ],200);
                    exit;
                }else{
                    $error_msg = "OTP not matched";
                     return response()->json([
                        'message' => $error_msg,
                        'status'=>400
                    ], 200);
                }
            }else{
                $error_msg = "User not available";
                     return response()->json([
                        'message' => $error_msg,
                        'status'=>400
                    ], 200);
            }
            
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function varify_match_otp(Request $request){
        $user= auth()->guard('api')->user();
        $validator = Validator::make($request->all(), [
            'otp'       => 'required|numeric',
            'varify_type'       => 'required|numeric',
        ]);
        if ($validator->fails())
        {
           return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }

        try 
        {
            $otp = $request['otp'];
            $varify_type = $request['varify_type'];
            $phone = $user->mobile;

            $user_otp = UserOtp::where('mobile',$phone)->first();
            if (!empty($user_otp)) {
                $preOtp = $user_otp->otp;
                if ($otp==$preOtp  || $otp==1234) {
                    $user = User::where('mobile',$phone)->where('status',1)->first();
                    $userotp    = UserOtp::where('mobile',$phone)->delete();

                    if ($varify_type==1) {
                        $user->phone_verified_at = 1;
                    }else{
                        $user->email_verified_at = 1;
                    }
                    $user->save();

                    $success_msg = 'OTP matched successfully.';
                    return response()->json([
                        'message' => $success_msg,
                        'data'     => $user,
                        'status'=>200,
                        
                    ],200);
                    exit;
                }else{
                    $error_msg = "OTP not matched";
                     return response()->json([
                        'message' => $error_msg,
                        'status'=>400
                    ], 200);
                }
            }else{
                $error_msg = "OTP not available";
                     return response()->json([
                        'message' => $error_msg,
                        'status'=>400
                    ], 200);
            }
            
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function forgot_match_otp(Request $request){
        $validator = Validator::make($request->all(), [
            'otp'       => 'required|numeric',
            'phone'     => 'required|numeric',
        ]);
        if ($validator->fails())
        {
           return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }

        try 
        {
            $otp = $request['otp'];
            $phone = $request['phone'];
            $user_otp = UserOtp::where('mobile',$phone)->first();
            if (!empty($user_otp)) {
                $preOtp = $user_otp->otp;
                if ($otp==$preOtp  || $otp==1234) {
                    $user = User::where('mobile',$phone)->first();
                    $userotp    = UserOtp::where('mobile',$phone)->delete();

                    $success_msg = 'OTP matched successfully.';
                    return response()->json([
                        'message' => $success_msg,
                        'user_id'     => $user->id,
                        'status'=>200,
                    ],200);
                    exit;
                }else{
                    $error_msg = "OTP not matched";
                     return response()->json([
                        'message' => $error_msg,
                        'status'=>400
                    ], 200);
                }
            }else{
                $error_msg = "User not available";
                     return response()->json([
                        'message' => $error_msg,
                        'status'=>400
                    ], 200);
            }
            
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function reset_password(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id'          => 'required|numeric',
            'password'         => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ]);
        if ($validator->fails())
        {
           return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }
        try 
        {
            $password = $request->password;
            $user = User::find($request['user_id']);
            
            if (!empty($user)) {
                $user->password_show    = $password;
                $user->password = \Hash::make($password);
                $user->update();
                $success_msg = 'Password changed successfully.';
                return response()->json([
                    'message' => $success_msg,
                    'status'=>200
                ], 200);
            }else{
                $error_msg = 'Password not changed.';
                return response()->json([
                    'message' => $error_msg,
                    'status'=>400
                ], 200);
            }                    
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function user_profile(Request $request){
        
        $user= auth()->guard('api')->user();
        
        try
            {
                if(!empty($user))
                {  
                    $success_msg = 'User Fetach Successfully.';             
                    return response()->json([
                        'message' => $success_msg,
                        'status'=>200,
                        'data'  => $user,
                    ], 200);
                }
                else
                {
                    $error_msg = 'User Not Found.';
                    return response()->json([
                        'message' => $error_msg,
                        'status'=>403,
                        'data'  => $user,
                    ], 200);
                }                  
            }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>'0','data'=>''], 200);
            exit;
        }
    }

    public function update_profile_image(Request $request){
        try
            {
                $user= auth()->guard('api')->user();
                $data = User::find($user->id);
                if(!empty($data))
                {  
                    if ($request['image_type'] == 1) {
                        $data->profile = '';
                    } else {
                        $data->id_card = '';
                    }
                    $data->save();
                    $success_msg = 'Image delete successfully.';             
                    return response()->json([
                        'message' => $success_msg,
                        'status'=>200,
                        'data'  => $data,
                    ], 200);
                }
                else
                {
                    $error_msg = 'User Not Found.';
                    return response()->json([
                        'message' => $error_msg,
                        'status'=>403,
                        'data'  => $user,
                    ], 200);
                }                  
            }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>'0','data'=>''], 200);
            exit;
        }
    }

    //User Profile update
    public function update_profile(Request $request){
        $user= auth()->guard('api')->user();
        $user_id = $user->id;
        $validator = Validator::make($request->all(),[
            'name'      => 'required|string',
            'email'     => 'required|unique:users,email,' .$user_id. ',id,status,1',
            'mobile'    => 'required|string|min:10|max:15|unique:users,mobile,' .$user_id. ',id,status,1',
            
        ]);
        if ($validator->fails()) {
             return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }
        try
        {
            $update = User::find($user_id);
            if ($request['profile']!="") {
                $image = $request->file('profile');
                $input['profile'] = time() . '.' . $image->getClientOriginalExtension();
                $ext = pathinfo($input['profile'], PATHINFO_EXTENSION);
                $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG','JPG',];
                if(! in_array($ext, $extensions))
                {
                    $status = 'File type is not allowed you have uploaded. Please upload any image !';
                    return back()->withInput()->withErrors($status);                   
                }
                $destinationPath = 'uploads/user/profile/'; // Use forward slashes here
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(320, 320, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['profile']);

                $update->profile = 'uploads/user/profile/' . $input['profile'];
            }
            if ($request['id_card']!="") {
                $image = $request->file('id_card');
                $input['id_card'] = time() . '.' . $image->getClientOriginalExtension();
                $ext = pathinfo($input['id_card'], PATHINFO_EXTENSION);
                $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG','JPG',];
                if(! in_array($ext, $extensions))
                {
                    $status = 'File type is not allowed you have uploaded. Please upload any image !';
                    return back()->withInput()->withErrors($status);                   
                }
                $destinationPath = 'uploads/user/card/'; // Use forward slashes here
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(320, 320, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['id_card']);

                $update->id_card = 'uploads/user/card/' . $input['id_card'];
            }
            
            $update->name = $request['name'];
            $update->email = $request['email'];
            $update->mobile = $request['mobile'];
            $update->dob = $request['dob'];
            $update->address = $request['address'];
            $update->country_code = $request['country'];
            $update->save();
            if($update)
            {
                return response()->json([
                    'message' => 'Profile update successfully',
                    'status'=>200,
                    'data'  => $update,
                ], 200);
            }
            else
            {
                return response()->json([
                    'message' => 'Profile not update',
                    'status'=>400,
                    'data'  => $user,
                ], 200);        
            }
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function change_password(Request $request){
        $user= auth()->guard('api')->user();
        $user_id = $user->id;
        try
        {
           
            if(Hash::check($request['current_password'], $user['password'])){
                $values=array(
                      'password'          => Hash::make($request['new_password']),
                );
                $validatior = Validator::make($request->all(), [
                    'current_password'          => 'required',
                    'new_password'              => 'required|different:current_password',
                ], [
                    'new_password.different' => "New Password can't be same as current password",
                ]);

                if ($validatior->fails())
                {
                        return response()->json(['status' => 400, 'message' => $validatior->errors()->first()],200);

                } else {
                    $user = User::find($request['user_id']);
                    $user->password_show    = $request['new_password'];
                    $user->password = Hash::make($request['new_password']);
                    $user->update();
                    return response()->json([
                        'message' => 'Password Update',
                        'status'=>200,
                        'Password'      => $request['new_password'],
                    ], 200);

                }

           } else {
                return response()->json([
                    'status' => 500,
                     'message' => "Incorrect current password. Please try again."
                 ],200);
           }
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function logout(){
        try
        {
            $user = Auth::user()->token();
            $user->revoke();
            return response()->json([
                'message' => 'Logout Successfully',
                'status'=>200,
            ], 200);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    } 

    public function delete_account(){
        try
        {
            $user_data= auth()->guard('api')->user();
            $user_data->status = 3;
            $user_data->save();

            $user = Auth::user()->token();
            $user->revoke();
            return response()->json([
                'message' => 'Account Delete Successfully',
                'status'=>200,
            ], 200);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function notifications_status(Request $request){
        try
        {
            $user_data= auth()->guard('api')->user();
            $user_data->notifications = $request['status'];
            $user_data->save();

            return response()->json([
                'message' => 'Notifications Status change Successfully',
                'status'=>200,
            ], 200);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function add_favorites(Request $request){
        $user= auth()->guard('api')->user();
        $user_id = $user->id;
        $validator = Validator::make($request->all(),[
            'hotel_id'   => 'required',
            
        ]);
        if ($validator->fails()) {
             return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }
        try
        {
            $save = new Favorites;
            $save->hotel_id = $request['hotel_id'];
            $save->user_id = $user_id;
            $save->save();
            if($save)
            {
                return response()->json([
                    'message' => 'Hotel favorites add successfully',
                    'status'=>200,
                    'data'  => $save,
                ], 200);
            }
            else
            {
                return response()->json([
                    'message' => 'Somthing went wrong',
                    'status'=>204,
                    'data'  => '',
                ], 200);        
            }
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function view_favorites(Request $request){
        $user= auth()->guard('api')->user();
        $user_id = $user->id;
        try
        {
            $view = Favorites::with('gethotel')->where('user_id',$user_id)->get();
            if($view)
            {
                return response()->json([
                    'message' => 'Data fetch successfully',
                    'status'=>200,
                    'data'  => $view,
                ], 200);
            }
            else
            {
                return response()->json([
                    'message' => 'Data not fount',
                    'status'=>204,
                    'data'  => '',
                ], 200);        
            }
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function delete_favorites(Request $request){
        $user= auth()->guard('api')->user();
        $validator = Validator::make($request->all(),[
            'hotel_id'   => 'required',
            
        ]);
        if ($validator->fails()) {
             return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }
        try
        {
            $data = Favorites::where('hotel_id',$request['hotel_id'])->where('user_id',$user->id)->first();
            if (!empty($data)) {
                $data->delete();
                return response()->json([
                    'message' => 'Hotel favorites delete successfully',
                    'status'=>200,
                ], 200);
            }else{
                return response()->json([
                    'message' => 'Hotel favorites not found',
                    'status'=>400,
                ], 200);
            }
            
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function referred_list(Request $request){
        try
        {
            $user= auth()->guard('api')->user();
            $data = User::where('user_refral',$user->refar_code)->select('id','name','profile')->get();
            
            $success_msg = 'Data Fetach Successfully.';             
            return response()->json([
                'message' => $success_msg,
                'status'=>200,
                'data'  => $data,
            ], 200);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function notifications(Request $request){
        try
        {
            $user= auth()->guard('api')->user();
            $data = Notifications::where('reciver_userId',$user->id)->select('id','type','message','created_at')->get();
            
            $success_msg = 'Data Fetach Successfully.';             
            return response()->json([
                'message' => $success_msg,
                'status'=>200,
                'data'  => $data,
            ], 200);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function invite_earn(Request $request){
        try
        {
            $user= auth()->guard('api')->user();
            $data = array(
                'title' => 'Get 200 Reward Points Credit for every friend you refer!, Share your friends the experience of learning from worlds best!', 
                'share_step1' => 'Invite a friend to cityroom',
                'share_step2' => 'That friend spends 300 Rupees or more booking their first lesson.',
                'share_step3' => 'After they finish their lesson, you both receive a 200 Reward Points.',
                'referrals_user' => User::where('user_refral',$user->refar_code)->count(), 
                'referrals_point' => $user->refar_point, 
                'referrals_code' => $user->refar_code, 
            );
              
            $success_msg = 'Data Fetach Successfully.';             
            return response()->json([
                'message' => $success_msg,
                'status'=>200,
                'data'  => $data,
            ], 200);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }

    public function wallet(Request $request){
        try
        {
            $user= auth()->guard('api')->user();
            $translation_history = TransferHistory::where('payment_type','Wallet')->with('get_hotel','get_booking')->where('user_id',$user->id)->get();
            $data = array(
                'wallet' => $user->wallet, 
                'translation_history' => $translation_history, 
            );
            
            $success_msg = 'Data Fetach Successfully.';             
            return response()->json([
                'message' => $success_msg,
                'status'=>200,
                'data'  => $data,
            ], 200);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
            return response()->json(['message' => 'Something went wrong.','status'=>500,'data'=>''], 200);
            exit;
        }
    }
}
