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
use App\user_plans;
use App\fees;
use App\Admin;
use App\Faqs;
use App\notifications;
use App\Images;
use App\Testimonys;
use App\Contents;
use App\mt4details;
use App\deposits;
use App\wdmethods;
use App\loans;
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

class LogicController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CPTrait;


     //Add plan requests
     public function addplan(Request $request){
       
        $plan=new plans();
  
        $plan->name= $request['name'];
        $plan->price= $request['price'];
        $plan->min_price= $request['min_price'];
        $plan->max_price= $request['max_price'];
        $plan->minr=$request['minr'];
        $plan->maxr=$request['maxr'];
        $plan->gift=$request['gift'];
        $plan->expected_return= $request['return'];
        $plan->increment_type= $request['t_type'];
        $plan->increment_interval= $request['t_interval'];
        $plan->increment_amount= $request['t_amount'];
        $plan->expiration= $request['expiration'];
        $plan->type= 'Main';
        $plan->save();
      return redirect()->back()
      ->with('message', 'Plan created Sucessful!');
    }


    //Update plans
    public function updateplan(Request $request){
        plans::where('id', $request['id'])
        ->update([
        'name' => $request['name'],
        'price' => $request['price'],
        'min_price' => $request['min_price'],
        'max_price' => $request['max_price'],
        'minr' => $request['minr'],
        'maxr' => $request['maxr'],
        'gift' => $request['gift'],
        'expected_return' => $request['return'],
        'increment_type' => $request['t_type'],
        'increment_amount' => $request['t_amount'],
        'increment_interval' => $request['t_interval'],
        'type' => 'Main',
        'expiration' => $request['expiration'],
        ]);
        return redirect()->back()
        ->with('message', 'Action Sucessful!');
      }

          //top up route
    public function topup(Request $request){
        
        $settings=settings::where('id', '=', '1')->first();
        $user=users::where('id',$request['user_id'])->first();
        $user_bal=$user->account_bal;
        $user_bonus=$user->bonus;
        $user_roi=$user->roi;
        $user_Ref=$user->ref_bonus;
        $message_type = "";
  
        if($request['t_type']=="Credit") {
          if ($request['type']=="Bonus") {
              $message_type = "Bonus";
            users::where('id', $request['user_id'])
              ->update([
              'bonus'=> $user_bonus + $request['amount'],
              'account_bal'=> $user_bal + $request->amount,
              ]);
          }elseif ($request['type']=="Profit") {
              $message_type = "Profit";
            users::where('id', $request->user_id)
              ->update([
                'roi'=> $user_roi + $request->amount,
                'account_bal'=> $user_bal + $request->amount,
              ]);
          }elseif($request['type']=="Ref_Bonus"){
              $message_type = "Referral Bonus";
            users::where('id', $request->user_id)
              ->update([
                'Ref_Bonus'=> $user_Ref + $request->amount,
                'account_bal'=> $user_bal + $request->amount,
              ]);
          }
          
          //send email notification
          $value = number_format($request->amount);
          $objDemo = new \stdClass();
          $objDemo->message = "You have just earned $value $settings->s_currency $message_type on your live $settings->site_name Account.";
          $objDemo->sender = $settings->site_name;
          $objDemo->date = \Carbon\Carbon::Now();
          $objDemo->subject ="Credit Notification";
          
          Mail::bcc($user->email)->send(new NewNotification($objDemo));
          
        
          //add history
          tp_transactions::create([
              'user' => $request->user_id,
              'plan' => "Credit",
              'amount'=>$request->amount,
              'type'=>$request->type,
            ]);
        
        }elseif($request['t_type']=="Debit") {
          if ($request['type']=="Bonus") {
            users::where('id', $request['user_id'])
              ->update([
              'bonus'=> $user_bonus - $request['amount'],
              'account_bal'=> $user_bal - $request->amount,
              ]);
          }elseif ($request['type']=="Profit") {
              users::where('id', $request->user_id)
                ->update([
                  'roi'=> $user_roi - $request->amount,
                  'account_bal'=> $user_bal - $request->amount,
                ]);
            }elseif($request['type']=="Ref_Bonus"){
              users::where('id', $request->user_id)
                ->update([
                  'Ref_Bonus'=> $user_Ref - $request->amount,
                  'account_bal'=> $user_bal - $request->amount,
                ]);
            }
            
             //add history
             
            tp_transactions::create([
                'user' => $request->user_id,
                'plan' => "Credit reversal",
                'amount'=>$request->amount,
                'type'=>$request->type,
            ]);
        
        }
            return redirect()->route('manageusers')
            ->with('message', 'Action Successful!');
      }


      // Send Mail to all users
      public function sendmailtoall(Request $request){
        $settings=settings::where('id', '=', '1')->first();
        
        //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = $request['message'];
        $objDemo->sender = $settings->site_name;
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject ="$settings->site_name Notification";
            
        Mail::bcc(users::all())->send(new NewNotification($objDemo));
        
        return redirect()->back()->with('message','Your message was sent successful!');
    }

    //Send mail to one user
    public function sendmailtooneuser(Request $request){
        $settings=settings::where('id', '=', '1')->first();
        $notif = notifications::create([
          'user_id' => $request->user_id,
           'message' => $request->message,
          ]);
        //send email notification
        $mailduser=users::where('id',$request->user_id)->first();
        $objDemo = new \stdClass();
        $objDemo->message = $request['message'];
        $objDemo->sender = $settings->site_name;
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject ="$settings->site_name Notification";
       
        Mail::bcc($mailduser->email)->send(new NewNotification($objDemo));
        return redirect()->back()->with('message','Your message was sent successful!');
  
    } 
    
    
    //Manually Add Trading History to Users Route
    public function addHistory(Request $request)
    {
      $history = tp_transactions::create([
        'user' => $request->user_id,
         'plan' => $request->plan,
         'amount'=>$request->amount,
         'type'=>$request->type,
        ]);
        $user=users::where('id', $request->user_id)->first();
        $user_bal=$user->account_bal;
        if (isset($request['amount'])>0) {
            users::where('id', $request->user_id)
            ->update([
            'account_bal'=> $user_bal + $request->amount,
            ]);
        }
        $user_roi=$user->roi;
        if ( isset($request['type'])=="ROI") {
          users::where('id', $request->user_id)
            ->update([
            'roi'=> $user_roi + $request->amount,
            ]);
        }

        return redirect()->back()
      ->with('message', 'Action Sucessful!');
    }

    //update users info
    public function edituser(Request $request){
    
        users::where('id', $request['user_id'])
        ->update([
        'name' => $request['name'],
        'l_name' => $request['l_name'],
        'email' =>$request['email'], 
        'phone_number' =>$request['phone'], 
        'ref_link' =>$request['ref_link'], 
        ]);
        return redirect()->back()
        ->with('message', 'User updated Successful!');
  }

        //Reset Password
        public function resetpswd(Request $request, $id){
            users::where('id', $id)
            ->update([
            'password' => bcrypt('user01236'),
            ]);
            return redirect()->route('manageusers')
            ->with('message', 'Password has been reset to default');
        } 
        //Access users account
        public function switchuser(Request $request, $id){
            $user = users::where('id',$id)->first();
            $settings=settings::where("id","1")->first();
            if($settings->site_preference=="Telegram bot only"){
                //return
                return redirect()->back()->with("message","User dashboard is disabled, switch from telegram bot and try again.");
            }
            
            //Byeppass 2FA
            $user->token_2fa_expiry = \Carbon\Carbon::now()->addMinutes(15)->toDateTimeString();
            $user->save();
            Auth::loginUsingId($user->id, true);
            return redirect()->route('dashboard')
            ->with('message', "You are logged in as $user->name !");
    } 

    
      //Clear user Account
      public function clearacct(Request $request, $id){
        users::where('id', $id)
        ->update([
        'account_bal' => '0',
        'roi' => '0',
        'bonus' => '0',
        'ref_bonus' => '0',
        ]);
        return redirect()->route('manageusers')
        ->with('message', 'Account cleared to $0.00');
      }

        //Delete deposit
        public function deldeposit(Request $request, $id){
            deposits::where('id', $id)->delete();
            return redirect()->back()
            ->with('message', 'Deposit history has been deleted!');
        }

          //process deposits
     public function pdeposit($id){
      
        //confirm the users plan
        $deposit=deposits::where('id',$id)->first();
        $user=users::where('id',$deposit->user)->first();
        if($deposit->user==$user->id){
            
            //add funds to user's account
          users::where('id',$user->id)
        ->update([
        'account_bal' => $user->account_bal + $deposit->amount,
        //'activated_at' => \Carbon\Carbon::now(),
        //'last_growth' => \Carbon\Carbon::now(),
        ]);
          
          //get settings 
          $settings=settings::where('id', '=', '1')->first();
          $earnings=$settings->referral_commission*$deposit->amount/100;
  
          if(!empty($user->ref_by)){
            //increment the user's referee total clients activated by 1
            agents::where('agent',$user->ref_by)->increment('total_activated', 1);
            agents::where('agent',$user->ref_by)->increment('earnings', $earnings);
            
            //add earnings to agent balance
            //get agent
            $agent=users::where('id',$user->ref_by)->first();
            users::where('id',$user->ref_by)
            ->update([
            'account_bal' => $agent->account_bal + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $user->ref_by,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
            //credit commission to ancestors
            $deposit_amount = $deposit->amount;
            $array=users::all();
            $parent=$user->id;
            $this->getAncestors($array, $deposit_amount, $parent);
            
          }
          
           //send email notification
          $objDemo = new \stdClass();
          $objDemo->message = "$user->name, This is to inform you that your deposit of $settings->currency$deposit->amount has been received and confirmed.";
          $objDemo->sender = "$settings->site_name";
          $objDemo->date = \Carbon\Carbon::Now();
          $objDemo->subject = "Deposit processed!";
              
          Mail::bcc($user->email)->send(new NewNotification($objDemo));
      
        }
  
        //update deposits
        deposits::where('id',$id)
        ->update([
        'status' => 'Processed',
        ]);
        return redirect()->back()
        ->with('message', 'Action Sucessful!');
      }
  
       //process loans
       public function processloan($id, $agree){
  
        $loan=loans::where('id',$id)->first();
        $user=users::where('id',$loan->user)->first();
        loans::where('id',$id)
        ->update([
        'status' => $agree == 'yes'? 'Approved':'Rejected',
        ]);
        
        $settings=settings::where('id', '=', '1')->first();
       
        $msg = $agree == 'yes'? "This is to inform you that your loan request for $settings->currency $loan->amount has been approved." 
                : "This is to inform you that your loan request for $settings->currency $loan->amount was rejected.";
          
          //send email notification
          $objDemo = new \stdClass();
        //   $objDemo->message = "This is to inform you that a successful withdrawal has just occured on your account. Amount: $settings->currency$withdrawal->amount.";
          $objDemo->message = $msg; 
          $objDemo->sender = $settings->site_name;
          $objDemo->subject ="Successful withdrawal";
          $objDemo->date = \Carbon\Carbon::Now();
              
          Mail::bcc($user->email)->send(new NewNotification($objDemo));
          
        return redirect()->back()
        ->with('message', 'Action Sucessful!');
        }
        
       //process withdrawals
       public function pwithdrawal($id){
  
        $withdrawal=withdrawals::where('id',$id)->first();
        $user=users::where('id',$withdrawal->user)->first();
        //if($withdrawal->user==$user->id){
          //debit the processed amount
          //users::where('id',$user->id)
        //->update([
        //'account_bal' => $user->account_bal-$withdrawal->to_deduct,
        //]);
        //}
        withdrawals::where('id',$id)
        ->update([
        'status' => 'Processed',
        ]);
        
        $settings=settings::where('id', '=', '1')->first();
          
          //send email notification
          $objDemo = new \stdClass();
          $objDemo->message = "This is to inform you that a successful withdrawal has just occured on your account. Amount: $settings->currency$withdrawal->amount.";
          $objDemo->sender = $settings->site_name;
          $objDemo->subject ="Successful withdrawal";
          $objDemo->date = \Carbon\Carbon::Now();
              
          Mail::bcc($user->email)->send(new NewNotification($objDemo));
          
        return redirect()->back()
        ->with('message', 'Action Sucessful!');
        }
  
  
       //Trash Plans route
       public function trashplan($id)
       {
        //remove users from the plan before deleting
        $users=users::where('confirmed_plan',$id)->get();
        foreach($users as $user){
          users::where('id',$user->id)
          ->update([
              'plan' => 0,
              'confirmed_plan' => 0,
          ]);  
        }
        plans::where('id',$id)->delete();
        return redirect()->back()
        ->with('message', 'Investment Plan deleted Successfully!');
       }
  
       
    public function delagent(Request $request, $id){
        //delete the user from agent model if exists
         $agent=agents::where('agent',$id)->first();
        if(!empty($agent)){
            agents::where('id', $agent->id)->delete();
        }
        return redirect()->back()
        ->with('message', "Action successful!.");
  }
    
    
    //Add agent
  public function addagent(Request $request){
    
    //get agent if exists
   $ag = agents::where('agent',$request['user'])->first();
          //check if the agent already exists
          if(count($ag)>0){
            //update the agent info
            agents::where('id',$ag->id)->increment('total_refered', $request['referred_users']);
          }
          else{
            //add the referee to the agents model

          $agent_id = DB::table('agents')->insertGetId(
            [
              'agent' => $request['user'],
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now(),
            ]
           );
          //increment refered clients by 1
          agents::where('id',$agent_id)->increment('total_refered', $request['referred_users']);
            }
    
    return redirect()->route('agents')
    ->with('message', 'action successful!');
  }
   

  //Notification
//   public function notification(Request $request){

//     return view('notification')->with(array('title'=>'Notification','settings' => settings::where('id', '=', '1')->first()));
// }

  //Delete user
  public function delsystemuser(Request $request, $id){
    //delete the user's withdrawals and deposits
    $deposits=deposits::where('user',$id)->get();
    if(!empty($deposits)){
        foreach($deposits as $deposit){
            deposits::where('id', $deposit->id)->delete();
        }
    }
    $withdrawals=withdrawals::where('user',$id)->get();
    if(!empty($withdrawals)){
        foreach($withdrawals as $withdrawals){
            withdrawals::where('id', $withdrawals->id)->delete();
        }
    }
    //delete the user plans
    $userp=user_plans::where('user',$id)->get();
    if(!empty($userp)){
        foreach($userp as $p){
            //delete plans that their owner does not exist 
        user_plans::where('id',$p->id)->delete();
        }
    }
    //delete the user from agent model if exists
     $agent=agents::where('agent',$id)->first();
    if(!empty($agent)){
        agents::where('id', $agent->id)->delete();
    }
    users::where('id', $id)->delete();
    return redirect()->route('manageusers')
    ->with('message', 'User has been deleted!');
  }  

  

  public function confirmsub($id){
    //get the sub details
    $sub = mt4details::where('id',$id)->first();
    //get user
    $user = users::where('id',$sub->client_id)->first();

    if($sub->duration == 'Monthly'){
      $end_at = \Carbon\Carbon::now()->addMonths(1)->toDateTimeString();
    }elseif($sub->duration == 'Quaterly'){
      $end_at = \Carbon\Carbon::now()->addMonths(4)->toDateTimeString();
    }elseif($sub->duration == 'Yearly'){
      $end_at = \Carbon\Carbon::now()->addYears(1)->toDateTimeString();
    }
    mt4details::where('id',$id)->update([
      'start_date' => \Carbon\Carbon::now(),
      'end_date' => $end_at,
      'status' => "Active",
    ]);

    $settings = settings::where('id', '=', '1')->first();
    //notify the client via email
    $objDemo = new \stdClass();
    $objDemo->message = "$user->name, This is to inform you that your trading account management
    request has been reviewed and processed. Thank you for trusting $settings->site_name";
    $objDemo->sender = "$settings->site_name";
    $objDemo->date = \Carbon\Carbon::Now();
    $objDemo->subject = "Managed Account Started!";
        
    //Mail::bcc($user->email)->send(new NewNotification($objDemo));

    return redirect()->back()
            ->with('message', 'Subscription Sucessfully started!');
  }

  public function delsub($id){
    mt4details::where('id',$id)->delete();
    return redirect()->back()
            ->with('message', 'Subscription Sucessfully Deleted');
  }

  public function saveuser(Request $request){

    $this->validate($request, [
    'name' => 'required|max:255',
    'email' => 'required|email|max:255|unique:users',
    'password' => 'required|min:6|confirmed',
    'Answer' => 'same:Captcha_Result',
    ]);


    $thisid = DB::table('users')->insertGetId( 
      [
        'name'=>$request['name'],
        'email'=>$request['email'],
        'phone_number'=>$request['phone'],
        'photo'=>'male.png',
        'ref_by'=>Auth::user()->id,
        'password'=>bcrypt($request['password']),
        'created_at'=>\Carbon\Carbon::now(),
        'updated_at'=>\Carbon\Carbon::now(),
      ]
     );
     
     /*
     //check if the refferral already exists
        $agent=agents::where('agent',Auth::user()->id)->first();
        if(count($agent)==1){
          //update the agent info
        agents::where('id',$agent->id)->increment('total_refered', 1);
        }
        else{
          //add the referee to the agents model

        $agent_id = DB::table('agents')->insertGetId(
          [
            'agent' => Auth::user()->id,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
          ]
         );
        //increment refered clients by 1
        agents::where('id',$agent_id)->increment('total_refered', 1);
          }
     */

     //assign referal link to user
      $settings=settings::where('id', '=', '1')->first();

      users::where('id', $thisid)
        ->update([
        'ref_link' => $settings->site_address.'/ref/'.$thisid,
        ]);
      return redirect()->back()
      ->with('message', 'User Registered Sucessful!');
}

public function saveadmin(Request $request){

    $this->validate($request, [
    'fname' => 'required|max:255',
    'l_name' => 'required|max:255',
    'email' => 'required|email|max:255|unique:admins',
    'password' => 'required|min:6|confirmed',
    ]);


    $thisid = DB::table('admins')->insertGetId( 
      [
        'firstName'=>$request['fname'],
        'lastName'=>$request['l_name'],
        'email'=>$request['email'],
        'phone'=>$request['phone'],
        'type'=>$request['type'],
        'acnt_type_active'=>"active",
        'dashboard_style'=> "Dark",
        'password'=>bcrypt($request['password']),
        'created_at'=>\Carbon\Carbon::now(),
        'updated_at'=>\Carbon\Carbon::now(),
      ]
     );
      return redirect()->back()
      ->with('message', 'Manager added Sucessfull!y');
}


    //Get uplines
function getAncestors($array, $deposit_amount, $parent = 0, $level = 0) {
  $referedMembers = '';
  $parent=users::where('id',$parent)->first();
  foreach ($array as $entry) {
    
      if ($entry->id == $parent->ref_by) {
          //get settings 
          $settings=settings::where('id', '=', '1')->first();
                    
           if($level == 1){
          $earnings=$settings->referral_commission1*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
          }elseif($level == 2){
          $earnings=$settings->referral_commission2*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
          }elseif($level == 3){
          $earnings=$settings->referral_commission3*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
          }elseif($level == 4){
          $earnings=$settings->referral_commission4*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
          }elseif($level == 5){
          $earnings=$settings->referral_commission5*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
         
          }

          if($level == 6){
          break;
          }
          
          //$referedMembers .= '- ' . $entry->name . '- Level: '. $level. '- Commission: '.$earnings.'<br/>';
          $referedMembers .= $this->getAncestors($array, $deposit_amount, $entry->id, $level+1);
      
       }
  }
  return $referedMembers;
}

// for front end content management
function RandomStringGenerator($n) 
      { 
          $generated_string = ""; 
          $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; 
          $len = strlen($domain); 
          for ($i = 0; $i < $n; $i++) 
          { 
              $index = rand(0, $len - 1); 
              $generated_string = $generated_string . $domain[$index]; 
          } 
          // Return the random generated string 
          return $generated_string; 
      } 
       
    public function savefaq(Request $request){

      $String = $this->RandomStringGenerator(6);

      $faq=new Faqs();
      $faq->ref_key = $String;
      $faq->question= $request['question'];
      $faq->answer= $request['answer'];
      $faq->save();
      return redirect()->back()
      ->with('message', 'Faq Added Sucessfully!');
    }

    public function savetestimony(Request $request){
      $String = $this->RandomStringGenerator(6);
      $tes=new Testimonys();
      $tes->name= $request['testifier'];
      $tes->ref_key = $String;
      $tes->position= $request['position'];
      $tes->what_is_said= $request['said'];
      $tes->picture= $request['picture'];
      $tes->save();
      return redirect()->back()
      ->with('message', 'Testimony Added Sucessfully!');
    }


    public function saveimg(Request $request){
    $settings = settings::where('id', '=', '1')->first();
      $String = $this->RandomStringGenerator(6);
      $this->validate($request, [
        'image' => 'required|mimes:jpg,jpeg,png',
        ]);
      
      $img=$request->file('image');
      $upload_dir="../$settings->files_key/cloud/uploads";
      $image=$img->getClientOriginalName();
      $move=$img->move($upload_dir, $image);

      $img=new Images();
      $img->title= $request['img_title'];
      $img->ref_key = $String;
      $img->description= $request['img_desc'];
      $img->img_path= $image;
      $img->save();
      return redirect()->back()
      ->with('message', 'Image Added Sucessfully!');
    }


    public function savecontents(Request $request){
      $String = $this->RandomStringGenerator(6);
      $cont=new Contents();
      $cont->title= $request['title'];
      $cont->ref_key = $String;
      $cont->description= $request['content'];
      $cont->save();
      return redirect()->back()
      ->with('message', 'Contents Added Sucessfully!');
    }

    public function updatefaq(Request $request){
      Faqs::where('id', $request['id'])
      ->update([
      'question' => $request['question'],
      'answer' => $request['answer'],
      ]);
      return redirect()->back()
      ->with('message', 'Faq Update Sucessful!');
    }

    public function updatetestimony(Request $request){
      Testimonys::where('id', $request['id'])
      ->update([
      'name'=>$request['testifier'],
      'position'=> $request['position'],
      'what_is_said'=> $request['said'],
      'picture'=> $request['picture'],
      ]);
      return redirect()->back()
      ->with('message', 'Testimony Update Sucessful!');
    }

    public function updatecontents(Request $request){
      Contents::where('id', $request['id'])
      ->update([
      'title'=> $request['title'],
      'description'=> $request['content'],
      ]);
      return redirect()->back()
      ->with('message', 'Content Update Sucessful!');
    }

    public function updateimg(Request $request){
    $settings = settings::where('id', '=', '1')->first();
      $this->validate($request, [
        'image' => 'mimes:jpg,jpeg,png',
        ]);
      
        $imgs = Images::where('id', '=', $request->id)->first();
        if(empty($request->file('image'))){
          $image=$imgs->img_path;
        }else{
          $img=$request->file('image');
          $upload_dir="../$settings->files_key/cloud/uploads";
          $image=$img->getClientOriginalName();
          $move=$img->move($upload_dir, $image);
        }

      Images::where('id', $request['id'])
      ->update([
      'title'=> $request['img_title'],
      'description'=> $request['img_desc'],
      'img_path'=> $image,
      ]);
      return redirect()->back()
      ->with('message', 'Image Updated Sucessfully!');
    }

    public function delfaq($id){
      Faqs::where('id',$id)->delete();
      return redirect()->back()
              ->with('message', 'Faq Sucessfully Deleted');
    }

    public function deltest($id){
      Testimonys::where('id',$id)->delete();
      return redirect()->back()
              ->with('message', 'Testimonial Sucessfully Deleted');
    }
    

   
}
