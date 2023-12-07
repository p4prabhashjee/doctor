<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Package;
use App\Models\User;
use App\Models\Category;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\NewsLetter;
use App\Models\ContactEnquery;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Exception;
use Cache;
use Session;
use Illuminate\Support\Facades\Auth;
use Validator;


class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::where('status', 1)->orderBy('id', 'DESC')->get();
        $servic = Category::where('status', 1)->select('id','title','slug','image','short_description')->orderBy('id', 'DESC')->limit(9)->get();
        $hospital = Hospital::where('status', 1)->select('id','title','slug','image','short_description')->orderBy('id', 'DESC')->limit(8)->get();
        $doctor = Doctor::where('status', 1)->select('id','title','slug','image','short_description')->orderBy('id', 'DESC')->limit(8)->get();
        $data = array(
            'title' => 'CityRoom',
            'banner' => $banner,
            'servic1' => $servic,
            'hospital' => $hospital,
            'doctor' => $doctor,
        );
        return view('frontend.index')->with($data);
    }




    public function newsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'      => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => '0', 'Message' => $validator->errors()->first()], 200);
        }
        try {
            $newUser            = new NewsLetter;
            $newUser->email     = $request->email;
            $newUser->save();

            return response()->json([
                'message' => 'Congratulation, your request send successfully.', 'status' => '1'
            ], 200);
            exit;
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            // p($error_message);
            return response()->json([
                'message' => $error_message,
                'status' => '0'
            ], 500);
            exit;
        }
    }


    public function contact_enquery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required|numeric',
            'message'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['Message' => $validator->errors()->first()], 400);
        }
        try {
            $newUser                   = new ContactEnquery;
            $newUser->name             = $request->name;
            $newUser->phone           = $request->phone;
            $newUser->email            = $request->email;
            $newUser->message      = $request->message;

            $newUser->save();

            return response()->json([
                'message' => 'Congratulation, your request send successfully.', 'status' => '1'
            ], 200);
            exit;
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            // p($error_message);
            return response()->json([
                'message' => $error_message,
                'status' => '0'
            ], 500);
            exit;
        }
    }
}
