<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Package;
use App\Models\User;
use App\Models\Hospital;
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

class HospitalController extends Controller
{
    public function hospital()
    {

        $hospital = Hospital::where('status', 1)->orderBy('id', 'DESC')->get();
        $data = array(
            'title' => 'Hospital',
            'hospital' => $hospital,
        );
        return view('frontend.hospitals')->with($data);
    }

    public function hospital_detail($id)
    {

        $file = Hospital::where('slug', $id)->first();
        $data = array(
            'title' => $file->title,
            'file' => $file,
        );
        return view('frontend.hospitalsdel')->with($data);
    }
}
