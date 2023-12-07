<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\City;
use App\Models\RoomImage;
use App\Models\HotelRoom;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Exception;
use Cache;
use File;
use Illuminate\Support\Facades\Auth;
use Validator;
use HasApiTokens;

class UserHomeController extends Controller
{
    public function index(Request $request){
        $user= auth()->guard('api')->user();
        $city = City::limit(10)->inRandomOrder()->where('status',1)->get();
        $recomended_city = City::limit(6)->where('recommended',1)->where('status',1)->orderBy('order','ASC')->get();
        $hotel = User::where('status',1)->where('role',2)->limit(10)->get();
        $data = array(
                'city'  => $city,
                'top_hotel_city'  => $recomended_city,
                'hotel'  => $hotel,
                'user_info' => array(
                    'user_name' => isset($user->name)?$user->name:'N/A',
                    'user_phone' => isset($user->mobile)?$user->mobile:'N/A',
                    'user_image' => isset($user->profile)?$user->profile:'N/A',
                    'user_email' => isset($user->email)?$user->email:'N/A',
                    'user_wallet' => isset($user->wallet)?$user->wallet:0,
                 ),
            );
        try
            {
                if(!empty($data) )
                {  
                    $success_msg = 'Data Fetach Successfully.';             
                    return response()->json([
                        'message' => $success_msg,
                        'status'=>200,
                        'data'  => $data,
                        
                    ], 200);
                }
                else
                {
                    $error_msg = 'Data Not Found.';
                    return response()->json([
                        'message' => $error_msg,
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

    public function hotel_detail(Request $request){
        $validator = Validator::make($request->all(),[
            'hotel_id'   => 'required',
            
        ]);
        if ($validator->fails()) {
             return response()->json(['status' => 400, 'message' => $validator->errors()->first()],200);
        }
        $data = User::with('single_room','get_room','hotel_food','get_policy')->find($request['hotel_id']);
        try
            {
                if(!empty($data))
                {  
                    $success_msg = 'Data Fetach Successfully.';             
                    return response()->json([
                        'message' => $success_msg,
                        'status'=>200,
                        'data'  => $data,
                    ], 200);
                }
                else
                {
                    $error_msg = 'Data Not Found.';
                    return response()->json([
                        'message' => $error_msg,
                        'status'=>201,
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
}
