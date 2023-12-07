<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use Validator;
use File;
use Intervention\Image\Facades\Image;

class FaqController extends Controller
{
    public function add(Request $request, $id = Null){
        $decrypted_id = get_decrypted_value($id, true);
        $getdata = Faq::find($decrypted_id);
        $pages = Page::where('status',1)->get();
        if ($id!="") {
            $saveurl = url('admin/faq/save/'.$id);
            $button = 'Update';
            $page_title = 'Update FAQ';
        }else{
            $saveurl = url('admin/faq/save');
            $button = 'Add';
            $page_title = 'Add FAQ';
        }
        $data = array(
            'getdata'    => $getdata,
            'saveurl'    => $saveurl,
            'button'     => $button,
            'title'      => $page_title,
            'page'      => $pages,
        );
        return view('admin.faq.add')->with($data);
    }
    public function save(Request $request, $id=NUll){
        if (!empty($id)) {
            $decrypted_id  = get_decrypted_value($id, true);
            $data          = Faq::find($decrypted_id);
            $success_msg   = 'Faq Updated Successfully.';
            $nameValidator = 'required';
            

        }else{
            $data          = New Faq;
            $success_msg   = 'Faq Added Successfully.';
            $nameValidator = 'required';
            
        }
        $Validatior = Validator::make($request->all(),[
            'question' => $nameValidator,
            
        ]); 

        if ($Validatior->fails()) {
            return back()->withInput()->withErrors($Validatior);
        }else{

            DB::beginTransaction();
            try
            {
                
                $data->question       = $request['question'];
                $data->answer = $request['answer'];
                $data->page_id = $request['page_id'];
                $data->pade_detail_id = $request['pade_detail_id'];
                
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
        return redirect()->route('faq')->withSuccess($success_msg);
    }

    public function index(){
        $data = array(
            'title' => 'View FAQ',
            'page_title' => 'View FAQ',
        );
        return view('admin.faq.view')->with($data);
    }

    public function anydata(Request $request){
        $anydata = [];
        $anydata = Faq::orderBy('id','DESC')->where('status','<',3)->where(function($query) use ($request)
            {
                 
                if (!empty($request['question']) ) 
                {
                    $query->where('question' ,'LIKE', '%' .$request['question']. '%');
                } 
                
                if (!empty($request['status']) ) 
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

             ->addColumn('action',function($anydata){
                $file_name = "category";
                $encrypted_id = get_encrypted_value($anydata->id, true);
                $action = '<a href="'.url('/admin/faq/add/'.$encrypted_id).'"><i class="fas fa-edit" data-original-title="Edit" data-toggle="tooltip" data-placement="bottom"></i></a> &nbsp;&nbsp;  
                        
                        <i class="fas fa-trash-alt text-danger delete-button" id="deletebtn" data-id="'.$anydata->id.'" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i>';
                return $action;
            })
            ->rawColumns(['status','action','type_data'])
            ->addIndexColumn()->make(true);
        
    }
    public function delete(Request $request){
        $id = $request['id'];
        $data = Faq::find($id);
        if ($data) {
        $data->status = 3;
        $data->save();
        $return_arr = array(
                    'status' => 'success',
                    'message' => 'FAQ Deleted Sussessfully!',
                );
        return response()->json($return_arr);
        }  
    }

             
    public function changeStatus(Request $request){
        $id   = $request['id'];
        $status = $request['status'];
        $data  =  Faq::find($id);
        if ($data) {
            $data->status = $status;
            $data->save();
            echo "Success";
        }     
    }
}
