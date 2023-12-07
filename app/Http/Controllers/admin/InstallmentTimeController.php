<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstallmentTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class InstallmentTimeController extends Controller
{
    public function add(Request $request, $id = Null){
        $decrypted_id = get_decrypted_value($id, true);
        $getdata = InstallmentTime::find($decrypted_id);
        if ($id!="") {
            $saveurl = url('admin/installment_time/save/'.$id);
            $button = 'Update';
            $page_title = 'Update Loan Installment Duration';
        }else{
            $saveurl = url('admin/installment_time/save');
            $button = 'Add';
            $page_title = 'Add Loan Installment Duration';
        }
        $data = array(
            'getdata'    => $getdata,
            'saveurl'    => $saveurl,
            'button'     => $button,
            'title'      => $page_title,
        );
        return view('admin.duration.add')->with($data);
    }
    public function save(Request $request, $id=NUll){
        if (!empty($id)) {
            $decrypted_id  = get_decrypted_value($id, true);
            $data          = InstallmentTime::find($decrypted_id);
            $success_msg   = 'Installment time Updated Successfully.';
            $nameValidator = 'required|unique:installment_times,duration,' . $decrypted_id.',id,status,1';
            

        }else{
            $data          = New InstallmentTime;
            $success_msg   = 'Installment time Added Successfully.';
            $nameValidator = 'required|unique:installment_times,duration,3,status';
            
        }
        $Validatior = Validator::make($request->all(),[
            'title' => $nameValidator,
            
        ]); 

        if ($Validatior->fails()) {
            return back()->withInput()->withErrors($Validatior);
        }else{

            DB::beginTransaction();
            try
            {
                $data->title       = $request['title'];
                $data->duration    = $request['duration'];
                $data->type        = $request['type'];
                $data->intall        = $request['intall'];
                $data->save();
            }
            catch (\Exception $e){
                DB::rollback();
                $error_message = $e->getMessage();
                p($error_message);
                return back()->withInput()->withErrors($error_message);
            }
            DB::commit();
        }
        return redirect()->route('installment_time')->withSuccess($success_msg);
    }

    public function index(){
        $data = array(
            'title' => 'View installment Duration',
            'page_title' => 'View installment Duration',
        );
        return view('admin.duration.view')->with($data);
    }

    public function anydata(Request $request){
        $anydata = [];
        $anydata = InstallmentTime::orderBy('id','DESC')->where('status','<',3)->where(function($query) use ($request)
            { 
                if (!empty($request['title'])) 
                {
                    $query->where('title' ,'LIKE', '%' .$request['title']. '%');
                } 
                if (!empty($request['status'])) 
                {
                    $query->where('status',$request['status']);
                } 
            })->get();
        
            return Datatables::of($anydata)


            ->addColumn('status',function($anydata){
                
                if ($anydata->status == 1) {
                    $status = 2;
                    $statusval = '<span onclick="changeStatus('.$anydata->id.','.$status.')"  class="btn btn-success btn-rounded btn-sm waves-effect waves-light">Active</span>';
                }else{
                    $status = 1;
                    $statusval = '<span onclick="changeStatus('.$anydata->id.','.$status.')" class="btn btn-danger btn-rounded btn-sm waves-effect waves-light">Deactive</span>';
                }
                return $statusval;
            })

            ->addColumn('type',function($anydata){
                
                if ($anydata->type == 1) {
                    $name = 'Day ('.$anydata->intall.' Installment)';
                    
                }elseif($anydata->type == 2){
                    $name = 'Week';
                    
                }elseif($anydata->type == 3){
                    $name = 'Month';
                }else{
                    $name = 'Year';
                }
                return $name;
            })

             ->addColumn('action',function($anydata){
                $file_name = "category";
                $encrypted_id = get_encrypted_value($anydata->id, true);
                $action = '<a href="'.url('/admin/installment_time/add/'.$encrypted_id).'"><i class="fas fa-edit" data-original-title="Edit" data-toggle="tooltip" data-placement="bottom"></i></a> &nbsp;&nbsp;  
                        
                        <i class="fas fa-trash-alt text-danger delete-button" id="deletebtn" data-id="'.$anydata->id.'" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i>';
                return $action;
            })
            ->rawColumns(['status','action','type_data'])
            ->addIndexColumn()->make(true);
        
    }
    public function delete(Request $request){
        $id = $request['id'];
        $data = InstallmentTime::find($id);
        if ($data) {
        $data->status = 3;
        $data->save();
        $return_arr = array(
                    'status' => 'success',
                    'message' => 'Installment time Deleted Sussessfully!',
                );
        return response()->json($return_arr);
        }  
    }

             
    public function changeStatus(Request $request){
        $id   = $request['id'];
        $status = $request['status'];
        $data  =  InstallmentTime::find($id);
        if ($data) {
            $data->status = $status;
            $data->save();
            echo "Success";
        }     
    }
}
