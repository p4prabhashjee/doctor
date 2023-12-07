<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Associate;
use Illuminate\Support\Str;
use App\Models\Team;
use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Exception;
use Cache;
use Illuminate\Support\Facades\Auth;
use Validator;

class WebPageController extends Controller
{
    public function about()
    {
        
        $about = Page::find(3);
        $data = array(
            'title' => 'About Us',
            'about' => $about,
        );
        return view('frontend.about')->with($data);
    }

    public function terms_condition()
    {
        
        $page = Page::find(2);
        $data = array(
            'title' => 'Terms & Condition',
            'page' => $page,
        );
        return view('frontend.term-conditions')->with($data);
    }

    public function privacy_policy()
    {
        
        $page = Page::find(1);
        $data = array(
            'title' => 'Privacy & Policy',
            'page' => $page,
        );
        return view('frontend.privacy-policy')->with($data);
    }

    public function contact_us()
    {
        $data = array(
            'title' => 'Contact Us',
        );
        return view('frontend.contact')->with($data);
    }
}
