<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
// use App\Models\SettingModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
// use App\Traits\ImageTrait;
use File;
use Image;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = array(
            'title' => "Setting",
            'page_title' => "Setting",
            'setting' => $setting,
            'saveurl' => route('setting_save'),
        );
        return view('admin.setting')->with($data);
    }

    public function save(Request $request)
    {
        $setting = Setting::first();
        if ($setting != "") {
            $request->validate([
                'header_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            if ($request['header_logo'] != "") {
                $file = $request->file('header_logo');
                $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG', 'JPG'];
                if (!in_array($ext, $extensions)) {
                    $status = 'File type is not allowed you have uploaded. Please upload any image !';
                    return back()->withInput()->withErrors($status);
                }
                $request->file('header_logo')->move("uploads/setting", $name);
                $setting->header_logo = 'uploads/setting/' . $name;
            }

            if ($request['footer_logo'] != "") {
                $file = $request->file('footer_logo');
                $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                // $ext = pathinfo($name, PATHINFO_EXTENSION);
                //     $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG','JPG'];
                //     if(! in_array($ext, $extensions))
                //     {
                //         $status = 'File type is not allowed you have uploaded. Please upload any image !';
                //         return back()->withInput()->withErrors($status);                   
                //     }
                $request->file('footer_logo')->move("uploads/setting", $name);
                $setting->footer_logo = 'uploads/setting/' . $name;
            }

            if ($request['fav_icon'] != "") {
                $file = $request->file('fav_icon');
                $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                // $ext = pathinfo($name, PATHINFO_EXTENSION);
                //     $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG','JPG'];
                //     if(! in_array($ext, $extensions))
                //     {
                //         $status = 'File type is not allowed you have uploaded. Please upload any image !';
                //         return back()->withInput()->withErrors($status);                   
                //     }
                $request->file('fav_icon')->move("uploads/setting", $name);
                $setting->fav_icon = 'uploads/setting/' . $name;
            }

            $setting->sitename           = $request['sitename'];
            $setting->email              = $request['email'];
            $setting->phone              = $request['phone'];
            $setting->address            = $request['address'];
            $setting->map                = $request['map'];
            $setting->short_description  = $request['short_description'];
            $setting->facebook           = $request['facebook'];
            $setting->instagram          = $request['instagram'];
            $setting->youtube            = $request['youtube'];
            $setting->twitter            = $request['twitter'];
            $setting->meta_title            = $request['meta_title'];
            $setting->meta_description            = $request['meta_description'];
            $setting->meta_keyword            = $request['meta_keyword'];
            $setting->script_markup            = $request['script_markup'];
            $setting->google_tag_manager            = $request['google_tag_manager'];
            $setting->google_analytics            = $request['google_analytics'];
            $setting->save();

            // $address = $setting->address; // Google HQ
            // $apiKey = 'AIzaSyBsgcZ-KEzokRcW4OIHYKG55-4dZbnw_i0';
            // $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
            // $geo = json_decode($geo, true); // Convert the JSON to an array
            // if (isset($geo['status']) && ($geo['status'] == 'OK')) {
            //   $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
            //   $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
            // }

            $setting->save();
            return back()->withSuccess("Setting Update Successfully.");
        } else {
            return back()->withInput()->withErrors("Setting Update Not Successfully.");
        }
    }
}
