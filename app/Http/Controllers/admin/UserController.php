<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

;
use App\Models\Country;

;
use App\Models\ApplyLoan;

;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function add(Request $request, $id = Null)
    {
        $decrypted_id = get_decrypted_value($id, true);
        $getdata = User::find($decrypted_id);
        $country = Country::get();
        if ($id != "") {
            $saveurl = url('admin/user/save/' . $id);
            $button = 'Update';
            $page_title = 'Update Customer';
        } else {
            $saveurl = url('admin/user/save');
            $button = 'Add';
            $page_title = 'Add Customer';
        }
        $data = array(
            'getdata' => $getdata,
            'saveurl' => $saveurl,
            'button' => $button,
            'title' => $page_title,
            'country' => $country,
        );
        return view('admin.user.add')->with($data);
    }
    public function save(Request $request, $id = NUll)
    {
        
        if (!empty($id)) {
            $decrypted_id = get_decrypted_value($id, true);
            $data = User::find($decrypted_id);
            $success_msg = 'Customer Updated Successfully.';
            $nameValidator = 'required|unique:users,mobile,' . $decrypted_id . ',id,status,1';
            $Validatior = Validator::make($request->all(), [
                // 'phone' => $nameValidator,
            ]);
        } else {
            $data = new User;
            $success_msg = 'Customer Added Successfully.';
            $nameValidator = 'required|unique:users';
            $Validatior = Validator::make($request->all(), [
                'mobile' => $nameValidator,
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ], [
                'confirm_password.same' => 'The password and confirm password are not the same.',
            ]);
        }

        if ($Validatior->fails()) {
            return back()->withInput()->withErrors($Validatior);
        } else {

            DB::beginTransaction();
            try {
                if ($request['id_card'] != "") {
                    $image = $request->file('id_card');
                    $input['id_card'] = time() . '.' . $image->getClientOriginalExtension();
                    $ext = pathinfo($input['id_card'], PATHINFO_EXTENSION);
                    $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG', 'JPG',];
                    if (!in_array($ext, $extensions)) {
                        $status = 'File type is not allowed you have uploaded. Please upload any image !';
                        return back()->withInput()->withErrors($status);
                    }
                    $destinationPath = 'uploads/user/card/'; // Use forward slashes here
                    $imgFile = Image::make($image->getRealPath());
                    $imgFile->resize(320, 320, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['id_card']);

                    $data->id_card = 'uploads/user/card/' . $input['id_card'];
                }

                if ($request['profile'] != "") {
                    $image = $request->file('profile');
                    $input['profile'] = time() . '.' . $image->getClientOriginalExtension();
                    $ext = pathinfo($input['profile'], PATHINFO_EXTENSION);
                    $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG', 'JPG',];
                    if (!in_array($ext, $extensions)) {
                        $status = 'File type is not allowed you have uploaded. Please upload any image !';
                        return back()->withInput()->withErrors($status);
                    }
                    $destinationPath = 'uploads/user/profile/'; // Use forward slashes here
                    $imgFile = Image::make($image->getRealPath());
                    $imgFile->resize(320, 320, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['profile']);

                    $data->profile = 'uploads/user/profile/' . $input['profile'];
                }

                $rand = rand(11, 99);
                $data->name = $request->name;
                $data->mobile = $request->mobile;
                $data->country_code = (int) $request['country'];
                $data->email = $request->email;
                $data->address = $request->address;
                if ($request['password'] != "") {
                    $data->password_show    = $request['password'];
                    $data->password = Hash::make($request['password']);
                } elseif ($request['e_password'] != "") {
                    $data->password_show    = $request['e_password'];
                    $data->password = Hash::make($request['e_password']);
                }

                $data->save();


            } catch (\Exception $e) {
                DB::rollback();
                $error_message = $e->getMessage();
                p($error_message);
                return back()->withInput()->withErrors($error_message);
            }
            DB::commit();
        }
        return redirect()->route('user')->withSuccess($success_msg);
    }
    public function index()
    {
        $country = Country::get();
        $data = array(
            'title' => 'View Customer',
            'page_title' => 'View Customer',
            'country' => $country,
        );
        return view('admin.user.view')->with($data);
    }

    public function anydata(Request $request)
    {
        $anydata = [];
        $anydata = User::where('status', '<', 3)->orderBy('id', 'DESC')->where(function ($query) use ($request) {

            if (!empty($request['title'])) {
                $query->where('name', 'LIKE', '%' . $request['title'] . '%');
            }

            if (!empty($request['status'])) {
                $query->where('status', $request['status']);
            }
            if (!empty($request['email'])) {
                $query->where('email', 'LIKE', '%' . $request['email'] . '%');
            }
            if (!empty($request['country'])) {
                $query->where('country_code', $request['country']);
            }
        })->get();


        return Datatables::of($anydata)

            ->addColumn('profile', function ($anydata) {
                if ($anydata['profile'] != "" || file_exists($anydata['profile'])) {
                    $img = url($anydata['profile']);
                } else {
                    $img = url('public/noimage.png');
                }
                return '<img style="border-radius: 50%;" alt="image" src=' . $img . ' width="35" height="35px">';
            })


            ->addColumn('phone', function ($anydata) {
                return isset($anydata->mobile) ? $anydata->mobile : 'N/A';
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
                $encrypted_id = get_encrypted_value($anydata->id, true);
                $action = '<a href="' . url('/admin/user/detail/' . $encrypted_id) . '"><i class="mdi mdi-eye text-info" data-original-title="View" data-toggle="tooltip" data-placement="bottom"></i></a>&nbsp;&nbsp;
                <a href="' . url('/admin/user/add/' . $encrypted_id) . '"><i class="fas fa-edit" data-original-title="Edit" data-toggle="tooltip" data-placement="bottom"></i></a> &nbsp;&nbsp;  
                        
                        <i class="fas fa-trash-alt text-danger delete-button" id="deletebtn" data-id="' . $anydata->id . '" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i>';
                return $action;
            })
            ->rawColumns(['status', 'action', 'state_data', 'profile', 'total_referral', 'wallet', 'phone'])
            ->addIndexColumn()->make(true);

    }
    public function delete(Request $request)
    {
        $id = $request['id'];
        $data = User::find($id);
        if ($data) {
            $data->status = 3;
            $data->save();
            $return_arr = array(
                'status' => 'success',
                'message' => 'Customer Deleted Sussessfully!',
            );
            return response()->json($return_arr);
        }
    }

    public function changeStatus(Request $request)
    {
        $id = $request['id'];
        $status = $request['status'];
        $data = User::find($id);
        if ($data) {
            $data->status = $status;
            $data->save();
            echo "Success";
        }
    }

    public function detail(Request $request, $id)
    {
        $decrypted_id = get_decrypted_value($id, true);

        $user = User::with('get_country')->find($decrypted_id);
        $apply_loan = ApplyLoan::with('get_loan')->where('user_id', $decrypted_id)->get();


        // p($user);
        $data = array(
            'title' => 'View Customer Detail',
            'page_title' => 'View Customer Detail',
            'user' => $user,
            'apply_loan' => $apply_loan,


        );
        return view('admin.user.detail')->with($data);
    }

    public function user_delete_image(Request $request)
    {
        $id = $request['data_id'];
        $data = User::find($id);
        if ($data) {
            if ($request['name'] == 'profile') {
                $data->profile = '';
            } else {
                $data->id_card = '';
            }
            $data->save();
            echo "Success";
        }
    }
}