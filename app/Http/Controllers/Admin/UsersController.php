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

class UsersController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CPTrait;



   //block user
   public function ublock($id){
  
    Admin::where('id',$id)
    ->update([
    'acnt_type_active' => 'blocked',
    ]);
    return redirect()->back()
    ->with('message', 'Manager Blocked');
  }

   //unblock user
   public function unblock($id){

    Admin::where('id',$id)
    ->update([
    'acnt_type_active' => 'active',
    ]);
    return redirect()->back()
    ->with('message', 'Manager Unblocked');
  }

  //Reset Password
  public function resetadpwd(Request $request, $id){
    Admin::where('id', $id)
    ->update([
    'password' => bcrypt('admin01236'),
    ]);
    return redirect()->back()
    ->with('message', 'Password reset Successful.');
} 

public function deluser(Request $request, $id){
  
    Admin::where('id', $id)->delete();
    return redirect()->back()
    ->with('message', 'Manager has been deleted!');
  }  

  //update users info
  public function editadmin(Request $request){
    
    Admin::where('id', $request['user_id'])
    ->update([
    'firstName' => $request['fname'],
    'lastName' => $request['l_name'],
    'email' =>$request['email'], 
    'phone' =>$request['phone'], 
    'type' =>$request['type'], 
    ]);
    return redirect()->back()
    ->with('message', 'Account updated Successfully!');
}

    //Send mail to one user
    public function sendmail(Request $request){

        $settings=settings::where('id', '=', '1')->first();
        //send email notification
        $mailduser=Admin::where('id',$request->user_id)->first();
        $objDemo = new \stdClass();
        $objDemo->message = $request['message'];
        $objDemo->sender = $settings->site_name;
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject ="$settings->site_name Notification";
        Mail::bcc($mailduser->email)->send(new NewNotification($objDemo));
        return redirect()->back()->with('message','Your message was sent successfully!');

    } 

    public function adminchangepassword(Request $request){
        return view('admin.changepassword')->with(array(
            'title'=>'Change Password',
            'settings' => settings::where('id', '=', '1')->first()
        ));
      }


       //Update Password
    public function adminupdatepass(Request $request){
        if(!password_verify($request['old_password'],$request['current_password']))
        {
          return redirect()->back()
          ->with('message', 'Incorrect Old Password');
        }
        $this->validate($request, [
        'password_confirmation' => 'same:password',
        'password' => 'min:6',
        ]);

          Admin::where('id', $request['id'])
          ->update([
          'password' => bcrypt($request['password']),
          ]);
          return redirect()->back()
          ->with('message', 'Password Changed Sucessfully');
    } 

    
   //accept KYC route
   public function acceptkyc($id)
   {
     //update user
     users::where('id',$id)
     ->update([
         'account_verify' => 'Verified',
         ]);
 
   return redirect()->back()
   ->with('message', 'Action Sucessful!');
   }
   
    //accept KYC route
   public function rejectkyc($id)
   {
     //update user
     users::where('id',$id)
     ->update([
         'account_verify' => 'Rejected',
         ]);
 
   return redirect()->back()
   ->with('message', 'Action Sucessful!');
   }
 
    //accept KYC route
    public function changestyle(Request $request)
    {
      if(isset($request['style']) and $request['style']=='true'){
        $dashboard_style="dark";
      }else{
        $dashboard_style="light";
      }
        //change dashboard style
      Admin::where('id', Auth('admin')->User()->id)
      ->update([
          'dashboard_style' => $dashboard_style,
          ]);
        return response()->json(['success'=>'Changed']);
        
    }

}
