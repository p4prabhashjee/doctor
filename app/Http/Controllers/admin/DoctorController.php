<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Award;
use App\Models\Membership;
use App\Models\Category;
use App\Models\Hospital;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class DoctorController extends Controller
{
    public function add(Request $request, $id = Null)
    {
        $decrypted_id = get_decrypted_value($id, true);
        $Specialist = Category::where('status', 1)->get();
        $hospital = Hospital::where('status', 1)->get();
        $getdata = Doctor::find($decrypted_id);
        if ($id != "") {
            $saveurl = url('admin/doctor/save/' . $id);
            $button = 'Update';
            $page_title = 'Update doctor';
        } else {
            $saveurl = url('admin/doctor/save');
            $button = 'Add';
            $page_title = 'Add Doctor';
        }
        $data = array(
            'getdata'    => $getdata,
            'saveurl'    => $saveurl,
            'button'     => $button,
            'title'      => $page_title,
            'specialist'      => $Specialist,
            'hospital'      => $hospital,
        );
        return view('admin.doctor.add')->with($data);
    }
    public function save(Request $request, $id = NUll)
    {
        if (!empty($id)) {
            $decrypted_id  = get_decrypted_value($id, true);
            $data          = Doctor::find($decrypted_id);
            $success_msg   = 'Doctor Updated Successfully.';
            $nameValidator = 'required|unique:doctors,phone,' . $decrypted_id . ',id,status,1';
        } else {
            $data          = new Doctor;
            $success_msg   = 'Doctor Added Successfully.';
            $nameValidator = 'required|unique:doctors,phone,3,status';
        }
        $Validatior = Validator::make($request->all(), [
            'title' => $nameValidator,

        ]);

        if ($Validatior->fails()) {
            return back()->withInput()->withErrors($Validatior);
        } else {

            DB::beginTransaction();
            try {
                if ($request['image'] != "") {
                    $file = $request->file('image');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                    $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG', 'JPG',];
                    if (!in_array($ext, $extensions)) {
                        $status = 'File type is not allowed you have uploaded. Please upload any image !';
                        return back()->withInput()->withErrors($status);
                    }
                    $request->file('image')->move("uploads/category", $name);
                    $data->image = 'uploads/category/' . $name;
                }
                $data->title       = $request['title'];
                $data->image_tag       = $request['image_tag'];
                $data->phone       = $request['phone'];
                $data->email       = $request['email'];
                $data->designation       = $request['designation'];
                $data->experience       = $request['experience'];
                $data->hospital_id       = $request['hospital_id'];
                $data->specialist_id       = $request['specialist_id'];
                $data->description = $request['editor1'];
                $data->short_description = $request['short_description'];
                $data->meta_title = $request['meta_title'];
                $data->meta_keyword = $request['meta_keyword'];
                $data->meta_description = $request['meta_description'];
                $data->slug        = Str::slug($request['title']);
                $data->save();

                if (!empty($request['award'])) {
                    $doctor_award = array_values($request['award']);
                    $doctor_awarddata = Award::where('doctor_id', $data->id)->pluck('id')->toArray();
                    $awardcolumn = array_column($doctor_award, 'award_id');

                    $notmatchaward = array_diff($doctor_awarddata, $awardcolumn);

                    foreach ($doctor_award as $imgkey => $variantt_img) {
                        // p($variantt_img['image']);
                        if ($imgkey >= 0) {
                            $varianttimg_id = $variantt_img['award_id'];

                            if ($varianttimg_id != "") {
                                $variantImg = Award::find($varianttimg_id);
                            } else {
                                $variantImg = new Award;
                            }


                            $variantImg->doctor_id     = $data->id;
                            $variantImg->name    = $variantt_img['title'];
                            $variantImg->save();
                        }
                    }
                    if (count($notmatchaward) > 0) {
                        foreach ($notmatchaward as $key => $notmatchawardvalue) {
                            $imagedelete = Award::find($notmatchawardvalue);
                            $imagedelete->delete();
                        }
                    }
                }
                if (!empty($request['member'])) {
                    $doctor_member = array_values($request['member']);
                    $doctor_memberdata = Membership::where('doctor_id', $data->id)->pluck('id')->toArray();
                    $membercolumn = array_column($doctor_member, 'member_id');

                    $notmatchmember = array_diff($doctor_memberdata, $membercolumn);

                    foreach ($doctor_member as $imgkey => $variantt_img) {
                        // p($variantt_img['image']);
                        if ($imgkey >= 0) {
                            $varianttimg_id = $variantt_img['member_id'];

                            if ($varianttimg_id != "") {
                                $variantImg = Membership::find($varianttimg_id);
                            } else {
                                $variantImg = new Membership;
                            }


                            $variantImg->doctor_id     = $data->id;
                            $variantImg->name    = $variantt_img['title'];
                            $variantImg->save();
                        }
                    }
                    if (count($notmatchmember) > 0) {
                        foreach ($notmatchmember as $key => $notmatchmembervalue) {
                            $imagedelete = Membership::find($notmatchmembervalue);
                            $imagedelete->delete();
                        }
                    }
                }
            } catch (\Exception $e) {
                DB::rollback();
                $error_message = $e->getMessage();
                p($error_message);
                return back()->withInput()->withErrors($error_message);
            }
            DB::commit();
        }
        return redirect()->route('doctor')->withSuccess($success_msg);
    }

    public function index()
    {
        $data = array(
            'title' => 'View Doctors',
            'page_title' => 'View Doctors',
        );
        return view('admin.doctor.view')->with($data);
    }

    public function anydata(Request $request)
    {
        $anydata = [];
        $anydata = Doctor::orderBy('id', 'DESC')->where('status', '<', 3)->where(function ($query) use ($request) {

            if (!empty($request['title'])) {
                $query->where('title', 'LIKE', '%' . $request['title'] . '%');
            }
            if (!empty($request['type'])) {
                $query->where('category_type', $request['type']);
            }
            if (!empty($request['status'])) {
                $query->where('status', $request['status']);
            }
        })->get();

        return Datatables::of($anydata)



            ->addColumn('image', function ($anydata) {
                if ($anydata['image'] != "" || file_exists($anydata['image'])) {
                    $img = url($anydata['image']);
                } else {
                    $img = url('public/noimage.png');
                }
                return '<img style="border-radius: 50%;" alt="image" src=' . $img . ' width="35" height="35px">';
            })

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
                $file_name = "category";
                $encrypted_id = get_encrypted_value($anydata->id, true);
                $action = '<a href="' . url('/admin/doctor/add/' . $encrypted_id) . '"><i class="fas fa-edit" data-original-title="Edit" data-toggle="tooltip" data-placement="bottom"></i></a> &nbsp;&nbsp;  
                        
                        <i class="fas fa-trash-alt text-danger delete-button" id="deletebtn" data-id="' . $anydata->id . '" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i>';
                return $action;
            })
            ->rawColumns(['status', 'action', 'image', 'type_data'])
            ->addIndexColumn()->make(true);
    }
    public function delete(Request $request)
    {
        $id = $request['id'];
        $data = Doctor::find($id);
        if ($data) {
            $data->status = 3;
            $data->save();
            $return_arr = array(
                'status' => 'success',
                'message' => 'Doctor Deleted Sussessfully!',
            );
            return response()->json($return_arr);
        }
    }


    public function changeStatus(Request $request)
    {
        $id   = $request['id'];
        $status = $request['status'];
        $data  =  Doctor::find($id);
        if ($data) {
            $data->status = $status;
            $data->save();
            echo "Success";
        }
    }
}
