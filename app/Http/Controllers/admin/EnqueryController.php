<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Associate;
use App\Models\UserReview;
use App\Models\ContactEnquery;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class EnqueryController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Associate Enquery',
            'page_title' => 'Associate Enquery',
        );
        return view('admin.enquery.associate')->with($data);
    }
    public function hospital_request()
    {
        $data = array(
            'title' => 'Hospital Enquery',
            'page_title' => 'Hospital Request',
        );
        return view('admin.enquery.hospital')->with($data);
    }
    public function doctor_request()
    {
        $data = array(
            'title' => 'Doctors Enquery',
            'page_title' => 'Doctors Enquery',
        );
        return view('admin.enquery.doctor')->with($data);
    }
    public function specialities_request()
    {
        $data = array(
            'title' => 'Specialities Enquery',
            'page_title' => 'Specialities Enquery',
        );
        return view('admin.enquery.specialities')->with($data);
    }

    public function anydata(Request $request)
    {
        $anydata = [];
        $anydata = Associate::orderBy('id', 'DESC')->get();

        return Datatables::of($anydata)



            // ->rawColumns()
            ->addIndexColumn()->make(true);
    }

    public function contact_request()
    {
        $data = array(
            'title' => 'Contact Enquiry',
            'page_title' => 'Contact Enquiry',
        );
        return view('admin.enquery.contact')->with($data);
    }

    public function contact_request_data(Request $request)
    {
        $anydata = [];
        $anydata = ContactEnquery::orderBy('id', 'DESC')->get();
        return Datatables::of($anydata)

            ->addColumn('date', function ($anydata) {
                return date_format($anydata->created_at, "d-M-Y");
            })
            ->rawColumns(['date'])
            ->addIndexColumn()->make(true);
    }
    public function hospital_request_data(Request $request)
    {
        $anydata = [];
        $anydata = ContactEnquery::orderBy('id', 'DESC')->get();
        return Datatables::of($anydata)

            ->addColumn('date', function ($anydata) {
                return date_format($anydata->created_at, "d-M-Y");
            })
            ->rawColumns(['date'])
            ->addIndexColumn()->make(true);
    }
    public function doctor_request_data(Request $request)
    {
        $anydata = [];
        $anydata = ContactEnquery::orderBy('id', 'DESC')->get();
        return Datatables::of($anydata)

            ->addColumn('date', function ($anydata) {
                return date_format($anydata->created_at, "d-M-Y");
            })
            ->rawColumns(['date'])
            ->addIndexColumn()->make(true);
    }
    public function specialities_request_data(Request $request)
    {
        $anydata = [];
        $anydata = ContactEnquery::orderBy('id', 'DESC')->get();
        return Datatables::of($anydata)

            ->addColumn('date', function ($anydata) {
                return date_format($anydata->created_at, "d-M-Y");
            })
            ->rawColumns(['date'])
            ->addIndexColumn()->make(true);
    }
}
