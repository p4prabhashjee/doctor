<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class CityController extends Controller
{
    public function add(Request $request, $id = Null)
    {
        $decrypted_id = get_decrypted_value($id, true);
        $getdata = City::find($decrypted_id);
        $state = State::where('status', 1)->get();
        if ($id != "") {
            $saveurl = url('admin/city/save/' . $id);
            $button = 'Update';
            $page_title = 'Update City';
        } else {
            $saveurl = url('admin/city/save');
            $button = 'Add';
            $page_title = 'Add City';
        }
        $data = array(
            'getdata'    => $getdata,
            'state'      => $state,
            'saveurl'    => $saveurl,
            'button'     => $button,
            'title'      => $page_title,
        );
        return view('admin.city.add')->with($data);
    }
    public function save(Request $request, $id = NUll)
    {
        if (!empty($id)) {
            $decrypted_id  = get_decrypted_value($id, true);
            $data          = City::find($decrypted_id);
            $success_msg   = 'City Updated Successfully.';

            $cityname = 'required|unique:cities,city,' . $decrypted_id . ',id,status,1';
        } else {
            $data          = new City;
            $success_msg   = 'City Added Successfully.';

            $nameValidator = 'unique:cities,city,3,status';
            $cityname = 'required|unique:cities,city,3,status';
        }
        $Validatior = Validator::make($request->all(), [
            'city' => $cityname,


        ]);

        if ($Validatior->fails()) {
            return back()->withInput()->withErrors($Validatior);
        } else {

            DB::beginTransaction();
            try {


                $data->city  = $request['city'];
                $data->state = $request['state'];

                $data->save();
            } catch (\Exception $e) {
                DB::rollback();
                $error_message = $e->getMessage();
                p($error_message);
                return back()->withInput()->withErrors($error_message);
            }
            DB::commit();
        }
        return redirect()->route('city')->withSuccess($success_msg);
    }

    public function index()
    {
        $state = State::where('status', 1)->get();
        $data = array(
            'title' => 'View Cities',
            'page_title' => 'View Cities',
            'state' => $state,
        );
        return view('admin.city.view')->with($data);
    }

    public function anydata(Request $request)
    {
        $anydata = [];

        $anydata = City::where('status', '<', 3)->where(function ($query) use ($request) {

            if (!empty($request['title'])) {
                $query->where('city', 'LIKE', '%' . $request['title'] . '%');
            }

            if (!empty($request['state'])) {
                $query->where('state', $request['state']);
            }

            if (!empty($request['status'])) {
                $query->where('status', $request['status']);
            }
        })->get();


        return Datatables::of($anydata)



            ->addColumn('status', function ($anydata) {

                if ($anydata->status == 1) {
                    $status = 2;
                    $statusval = '<span onclick="changeStatus(' . $anydata->id . ',' . $status . ')"  class="btn btn-success btn-rounded btn-sm waves-effect waves-light">Active</span>';
                } else {
                    $status = 1;
                    $statusval = '<span onclick="changeStatus(' . $anydata->id . ',' . $status . ')" class="btn btn-danger btn-rounded btn-sm waves-effect waves-light">Deactive</span>';
                }
                return $statusval;
            })

            ->addColumn('action', function ($anydata) {
                $encrypted_id = get_encrypted_value($anydata->id, true);
                $action = '<a href="' . url('/admin/city/add/' . $encrypted_id) . '"><i class="fas fa-edit" data-original-title="Edit" data-toggle="tooltip" data-placement="bottom"></i></a> &nbsp;&nbsp;  
                        
                        <i class="fas fa-trash-alt text-danger delete-button" id="deletebtn" data-id="' . $anydata->id . '" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i>';
                return $action;
            })
            ->rawColumns(['status', 'action', 'state_data'])
            ->addIndexColumn()->make(true);
    }
    public function delete(Request $request)
    {
        $id = $request['id'];
        $data = City::find($id);
        if ($data) {
            $data->status = 3;
            $data->save();
            $return_arr = array(
                'status' => 'success',
                'message' => 'City Deleted Sussessfully!',
            );
            return response()->json($return_arr);
        }
    }

    public function changeStatus(Request $request)
    {
        $id   = $request['id'];
        $status = $request['status'];
        $data  =  City::find($id);
        if ($data) {
            $data->status = $status;
            $data->save();
            echo "Success";
        }
    }
}
