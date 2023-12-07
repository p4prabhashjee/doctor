<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Package;
use App\Models\User;
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

class DoctorController extends Controller
{
    public function doctor()
    {

        $doctor = Doctor::where('status', 1)->orderBy('id', 'DESC')->get();
        $data = array(
            'title' => 'CityRoom',
            'doctor' => $doctor,
        );
        return view('frontend.doctors')->with($data);
    }

    public function doctor_detail($id)
    {

        $file = Doctor::where('slug', $id)->first();
        $data = array(
            'title' => 'CityRoom',
            'file' => $file,
        );
        return view('frontend.doctors')->with($data);
    }
}
