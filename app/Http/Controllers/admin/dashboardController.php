<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Loan;
use App\Models\ApplyLoan;
use App\Models\Page;
use App\Models\TransactionHistory;
use Carbon\Carbon;
use Session;
use Stripe;

class dashboardController extends Controller
{
    public function index(){

        

        
        
        $total_user         = User::where('status','<',3)->count();
        
        $Page   = Page::count();
        

        
        
        $data = array(
            'title' => 'Dashboard',
            'total_user'        => $total_user,
            
            'Page'  => $Page,
            
        );
        return view('admin.dashboard')->with($data);
    }

   
}
