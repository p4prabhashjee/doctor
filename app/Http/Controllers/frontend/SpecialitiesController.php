<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Package;
use App\Models\User;
use App\Models\Category;
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

class SpecialitiesController extends Controller
{
    public function specialities()
    {

        $servic = Category::where('status', 1)->orderBy('id', 'DESC')->get();
        $data = array(
            'title' => 'Specialities',
            'servic' => $servic,
        );
        return view('frontend.specialities')->with($data);
    }

    public function specialities_detail($id)
    {

        $file = Category::where('slug', $id)->first();
        $doctor = Doctor::where(['status'=>1,'specialist_id'=>$file->id])->get();
        $data = array(
            'title' => $file->title,
            'file' => $file,
            'doctor' => $doctor,
        );
        return view('frontend.specialities-details')->with($data);
    }
}
