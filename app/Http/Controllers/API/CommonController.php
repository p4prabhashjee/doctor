<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amities;
use App\Models\Category;
use App\Models\Country;
use App\Models\Page;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class CommonController extends Controller
{
    public function all_category(Request $request){
        $amities= Amities::where('status',1)->get();
        $room_category= Category::where('category_type',1)->get();
        $food_category= Category::where('category_type',2)->get();
        $collection= Collection::where('status',1)->get();
        try
            {
                if(!empty($amities) || !empty($room_category) || !empty($food_category) || !empty($collection))
                {  
                    $success_msg = 'Data Fetach Successfully.';             
                    return response()->json([
                        'message' => $success_msg,
                        'status'=>200,
                        'amities'  => $amities,
                        'room_category'  => $room_category,
                        'food_category'  => $food_category,
                        'collection'  => $collection,
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

    public function country(Request $request){
        $data= Country::select('id','name')->get();
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

    public function privacy_policy(Request $request){
        $data= Page::find(1);
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

    public function terms_conditions(Request $request){
        $data= Page::find(2);
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

  
}
