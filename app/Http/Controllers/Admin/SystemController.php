<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use App\User;
use App\settings;
use App\account;
use App\plans;
use App\hisplans;
use App\agents;
use App\confirmations;
use App\users;
use App\Admin;
use App\user_plans;
use App\fees;
use App\mt4details;
use App\deposits;
use App\wdmethods;
use App\withdrawals;
use App\cp_transactions;
use App\tp_transactions;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Traits\CPTrait;

use App\Mail\NewNotification;
use App\Mail\newroi;
use App\Mail\endplan;
use Illuminate\Support\Facades\Mail;

class SystemController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CPTrait;


     //block user
   public function ublock($id){
  
    users::where('id',$id)
    ->update([
    'status' => 'blocked',
    ]);
    return redirect()->route('manageusers')
    ->with('message', 'Action Sucessful!');
  }

   //unblock user
   public function unblock($id){

    users::where('id',$id)
    ->update([
    'status' => 'active',
    ]);
    return redirect()->route('manageusers')
    ->with('message', 'Action Sucessful!');
  }


  //Turn on/off user trade
  public function usertrademode(Request $request, $id, $action){
    if($action=="on"){
        $action = "on";
    }elseif($action == "off"){
        $action = "off";
    }else{
        return redirect()-back()->with('message',"Unknown action!");
    }
    
    users::where('id', $id)
    ->update([
    'trade_mode' => $action,
    ]);
    return redirect()->back()
    ->with('message', "User trade mode has been turned $action.");
}


}
