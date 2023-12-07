<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\InstallmentTime;
use App\Models\Country;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class LoanController extends Controller
{
    public function add(Request $request, $id = Null)
    {
        $decrypted_id = get_decrypted_value($id, true);
        $getdata = Loan::find($decrypted_id);
        $duration = InstallmentTime::where('status', 1)->select('id', 'title')->get();
        $country = Country::select('id', 'name')->get();
        if ($id != "") {
            $saveurl = url('admin/loan/save/' . $id);
            $button = 'Update';
            $page_title = 'Update Loan Product';
        } else {
            $saveurl = url('admin/loan/save');
            $button = 'Add';
            $page_title = 'Add Loan Product';
        }
        $data = array(
            'getdata' => $getdata,
            'saveurl' => $saveurl,
            'button' => $button,
            'title' => $page_title,
            'country' => $country,
            'duration' => $duration,
        );
        return view('admin.loan.add')->with($data);
    }
    public function save(Request $request, $id = NUll)
    {
        if (!empty($id)) {
            $decrypted_id = get_decrypted_value($id, true);
            $data = Loan::find($decrypted_id);
            $success_msg = 'Loan Updated Successfully.';
            $nameValidator = 'required|unique:loans,title,' . $decrypted_id . ',id,status,1';
            $Validatior = Validator::make($request->all(), [
                // 'phone' => $nameValidator,
            ]);
        } else {
            $data = new Loan;
            $success_msg = 'Loan Added Successfully.';
            $nameValidator = 'required|unique:loans';
            $Validatior = Validator::make($request->all(), [
                'name' => $nameValidator,

            ]);
        }

        if ($Validatior->fails()) {
            return back()->withInput()->withErrors($Validatior);
        } else {

            DB::beginTransaction();
            try {
                if ($request['image'] != "") {
                    $image = $request->file('image');
                    $input['image'] = time() . '.' . $image->getClientOriginalExtension();
                    $ext = pathinfo($input['image'], PATHINFO_EXTENSION);
                    $extensions = ['jpg', 'jpeg', 'png', 'JPEG', 'PNG', 'JPG',];
                    if (!in_array($ext, $extensions)) {
                        $status = 'File type is not allowed you have uploaded. Please upload any image !';
                        return back()->withInput()->withErrors($status);
                    }
                    $destinationPath = 'uploads/category'; // Use forward slashes here
                    $imgFile = Image::make($image->getRealPath());
                    $imgFile->resize(320, 320, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['image']);

                    $data->image = 'uploads/category/' . $input['image'];
                }

                $data->name                     = $request->name;
                $data->description              = $request->description;
                $data->interest_rate            = $request->interest_rate;
                $data->late_extension_interest  = $request->late_extension_interest;
                $data->duration                 = $request->duration;
                $data->amount_range             = $request->amount_range;
                $data->installment              = $request->installment;
                $data->max_range                = $request->max_range;
                $data->late_terms_conditions    = $request->late_terms_conditions;
                $data->country                  = $request->country;
                $data->loan_bonus               = $request->loan_bonus;
                $data->loan_installment         = $request->loan_installment;
                $data->save();
            } catch (\Exception $e) {
                DB::rollback();
                $error_message = $e->getMessage();
                p($error_message);
                return back()->withInput()->withErrors($error_message);
            }
            DB::commit();
        }
        return redirect()->route('loan')->withSuccess($success_msg);
    }
    public function index()
    {
        $country = Country::select('id', 'name')->get();
        $data = array(
            'title' => 'View Loan Product',
            'page_title' => 'View Loan Product',
            'country' => $country,
        );
        return view('admin.loan.view')->with($data);
    }

    public function anydata(Request $request)
    {
        $anydata = [];
        $anydata = Loan::where('status', '<', 3)->orderBy('id', 'DESC')->where(function ($query) use ($request) {

            if (!empty($request['title'])) {
                $query->where('name', 'LIKE', '%' . $request['title'] . '%');
            }

            if (!empty($request['status'])) {
                $query->where('status', $request['status']);
            }

            if (!empty($request['country'])) {
                $query->where('country', $request['country']);
            }
        })->get();


        return Datatables::of($anydata)

            ->addColumn('profile', function ($anydata) {
                if ($anydata['image'] != "" || file_exists($anydata['image'])) {
                    $img = url($anydata['image']);
                } else {
                    $img = url('public/noimage.png');
                }
                return '<img style="border-radius: 50%;" alt="image" src=' . $img . ' width="35" height="35px">';
            })

            ->addColumn('description', function ($anydata) {

                return $anydata['description'];
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
                $action = '<a href="' . url('/admin/loan/detail/' . $encrypted_id) . '"><i class="mdi mdi-eye text-info" data-original-title="View" data-toggle="tooltip" data-placement="bottom"></i></a>&nbsp;&nbsp;
                <a href="' . url('/admin/loan/add/' . $encrypted_id) . '"><i class="fas fa-edit" data-original-title="Edit" data-toggle="tooltip" data-placement="bottom"></i></a> &nbsp;&nbsp;  
                        
                        <i class="fas fa-trash-alt text-danger delete-button" id="deletebtn" data-id="' . $anydata->id . '" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i>';
                return $action;
            })
            ->rawColumns(['status', 'action', 'state_data', 'profile', 'total_referral', 'wallet', 'phone'])
            ->addIndexColumn()->make(true);
    }
    public function delete(Request $request)
    {
        $id = $request['id'];
        $data = Loan::find($id);
        if ($data) {
            $data->status = 3;
            $data->save();
            $return_arr = array(
                'status' => 'success',
                'message' => 'Loan Product Deleted Sussessfully!',
            );
            return response()->json($return_arr);
        }
    }

    public function changeStatus(Request $request)
    {
        $id = $request['id'];
        $status = $request['status'];
        $data = Loan::find($id);
        if ($data) {
            $data->status = $status;
            $data->save();
            echo "Success";
        }
    }

    public function detail(Request $request, $id)
    {
        $decrypted_id = get_decrypted_value($id, true);

        $data = Loan::find($decrypted_id);

        // p($user);
        $data = array(
            'title' => $data->name,
            'page_title' => 'View Loan Product Detail',
            'data' => $data,

        );
        return view('admin.loan.detail')->with($data);
    }

    public function loan_delete_image(Request $request)
    {
        $id = $request['data_id'];

        $data = Loan::find($id);
        if ($data) {
            $data->image = '';
            $data->save();
            echo "Success";
        }
    }
}
