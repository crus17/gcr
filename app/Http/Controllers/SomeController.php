<?php

namespace App\Http\Controllers;

use App\settings;
use App\users;
use App\user_plans;
use App\plans;
use App\withdrawals;
use App\deposits;
use App\loans;
use App\assets;
use App\markets;
use App\cp_transactions;
use App\tp_transactions;
use App\notifications;
use App\wdmethods;
use DB;
// use Cloudder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;

use App\Http\Traits\CPTrait;

class SomeController extends Controller
{
    use CPTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    

    
    
   

      //Trading history route
     public function tradinghistory(){
      
      return view('user.thistory')
      ->with(array(
        
        't_history' => tp_transactions::where('user',Auth::user()->id)
        ->where('type','ROI')
        ->orderBy('id', 'desc')
        ->get(),
        'title' => 'Trading History',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }
  
   //Account transactions history route
     public function accounthistory(){
      
      return view('user.transactions')
      ->with(array(
        
        't_history' => tp_transactions::where('user',Auth::user()->id)
        ->where('type','<>','ROI')
        ->orderBy('id', 'desc')
        ->get(),
        'withdrawals' => withdrawals::where('user', Auth::user()->id)->orderBy('id', 'desc')
        ->get(),
        'deposits' => deposits::where('user', Auth::user()->id)->orderBy('id', 'desc')
        ->get(),
        'title' => 'Account Transactions History',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }
  
  //Notification route
  public function notification(){
      
    return view('user.notification')
    ->with(array(
      'Notif' => notifications::where('user_id',Auth::user()->id)->orderBy('id', 'desc')
             ->paginate(12),
      'title' => 'Notification',
      'settings' => settings::where('id', '=', '1')->first(),
    ));
}

//Profile route
public function profile(){
  $userinfo = users::where('id',Auth::user()->id)->first();
  return view('user.profile')->with(array(
    'userinfo' => $userinfo,
    'title' => 'Profile',
    'settings' => settings::where('id', '=', '1')->first(),
  ));
}


//Updating Profile Route
public function updatepix(Request $request){
    //Validate
    $request->validate([
      'ppix' => 'mimes:jpg,jpeg,png|max:4000',
    ]);

    $settings=settings::where('id','1')->first();
    //photo
    $img=$request->file('ppix');
    $upload_dir="./$settings->files_key/cloud/uploads";
    $image=$img->getClientOriginalName();
    $move=$img->move($upload_dir, $image);

    // // Cloudinary
    // $name = $request->file('ppix')->getClientOriginalName();
    // $image_name = $request->file('ppix')->getRealPath();;
    // Cloudder::upload($image_name, null);
    // list($width, $height) = getimagesize($image_name);
    // $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
    // //save to uploads directory
    // $image->move(public_path("uploads"), $name);
    // //Save images
    // // $this->saveImages($request, $image_url);
    // users::where('id', $request->user_id)->update(['photo'=>$name,]);
    // // Coudinary Ends Here


    users::where('id', $request->user_id)
    ->update([
      'photo'=>$image,
    ]);
  return redirect()->back()
  ->with('message', 'Picture change Sucessful!');
  
}


//Updating Profile Route
public function updateprofile(Request $request){
    users::where('id', Auth::user()->id)->first()
        ->update([
          'name'=> $request->firstname,
          'l_name'=> $request->surname,
          'dob'=> $request->dob,
		  'phone_number'=> $request->phone,
          'address'=> $request->address,
        ]);
    return redirect()->back()
    ->with('message', 'Account Update Sucessful!');
    
}

public function delnotif($id){
  notifications::where('id',$id)->delete();
  //$notif =notifcations::where('id',$id)->delete();
  return redirect()->back()
          ->with('message', 'Message Sucessfully Deleted');
}

  //save CoinPayments credentials to DB
        public function updatecpd(Request $request){

          cp_transactions::where('id', '1')
          ->update([
          'cp_p_key'=>$request['cp_p_key'],
          'cp_pv_key'=>$request['cp_pv_key'],
          'cp_m_id'=>$request['cp_m_id'],
          'cp_ipn_secret'=>$request['cp_ipn_secret'],
          'cp_debug_email'=>$request['cp_debug_email'],
          
          ]);
          return redirect()->back()
          ->with('message', 'Action Sucessful');
    }


    //payment route
    public function loan(Request $request){
        
        $loans = loans::where('user', Auth::user()->id);
        
        return view('user.loan')
        ->with(array(
         'loans' => $loans
            // ->where('status','Pending')
            ->orderBy('id', 'desc')
            ->get(),
            'title' => 'Loan Request',
            'settings' => settings::where('id', '=', '1')->first(),
            'loan_status' => $loans->where('status','Pending') ->first(),
         ));
    }
  
  //payment route
    public function payment(Request $request){
      
      return view('user.payment')
      ->with(array(
        'amount'=>$request->session()->get('amount'),
        'payment_mode'=>$request->session()->get('payment_mode'),
        'pay_type' => $request->session()->get('pay_type'),
        'plan_id' => $request->session()->get('plan_id'),
        'title' => 'Make deposit',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

  //accept KYC route
  public function changetheme(Request $request)
  {
    if(isset($request['style']) and $request['style']=='true'){
      $dashboard_style="dark";
    }else{
      $dashboard_style="light";
    }
      //change dashboard style
    users::where('id', Auth::user()->id)
    ->update([
        'dashboard_style' => $dashboard_style,
        ]);
      return response()->json(['success'=>'Changed']);
      
  }

       //Save verification documents requests
  public function savevdocs(Request $request){

      $this->validate($request, [
      'id' => 'mimes:jpg,jpeg,png|max:4000',
      'passport' => 'mimes:jpg,jpeg,png|max:4000',
      ]);
      
      $settings=settings::where('id','1')->first();
        
        //proofs
        $id=$request->file('id');
        $passport=$request->file('passport');
        $upload_dir="./$settings->files_key/cloud/uploads";
        
        $image1=$id->getClientOriginalName();
        $move=$id->move($upload_dir, $image1);
        
        $image2=$passport->getClientOriginalName();
        $move=$passport->move($upload_dir, $image2);
        //end proofs process
       
    //update user
    users::where('id',Auth::user()->id)
    ->update([
        'id_card' => $image1,
        'passport' => $image2,
        'account_verify' => 'Under review',
        ]);

  return redirect()->back()
  ->with('message', 'Action Sucessful! Please wait for system to validate your submission.');
}
  
  
    //Return payment page
    public function deposit(Request $request){
       /*
         //fetch user plan
    $dplan=plans::where('id',Auth::user()->plan)->first();
    
    if(count($dplan)<1){
        return redirect()->route('mplans')
      ->with('message', 'Please choose an investment plan first.');
    }
  
  
    if($request['amount'] != $dplan->price){
        return redirect()->back()->with('message',"The amount must be your current plan price. $dplan->price.");
    }*/
      //store payment info in session
      $request->session()->put('amount', $request['amount']);
      $request->session()->put('payment_mode', $request['payment_mode']);

      if(isset($request['pay_type'])){
      $request->session()->put('pay_type', $request['pay_type']);
      $request->session()->put('plan_id', $request['plan_id']);
      }

      return redirect()->route('payment')
      ->with(array(
        'title' => 'Make deposit',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Save load requests
  public function saveloanrequest(Request $request){
      
      /*if($request['pay_type']=='plandeposit'){
          //add the user to this plan for approval
          users::where('id',Auth::user()->id)
          ->update([
            'plan'=> $request['plan_id'],
          ]);
          $plan=$request['plan_id'];
        }elseif($request['pay_type'] == 'Subscription Trading'){
          $plan="Subscription Trading";
        }
        else{
          $plan=Auth::user()->plan;
        }*/
       
    $loans = loans::where('user', Auth::user()->id);
        
    if($loans->where('status', 'Pending')){
        return redirect()->back()
        ->with('message', 'Application Unsuccessful! Your last loan application is under review.'); 
    }
        
    $lon=new loans();

    $lon->amount= $request['amount'];
    $lon->repayments= $request['repayments'];
    $lon->status= 'Pending';
    $lon->user= Auth::user()->id;
    $lon->save();

    // Kill the session variables
    $request->session()->forget('repayments');
    $request->session()->forget('amount');

  return redirect()->route('loan')
  ->with('message', 'Loan Application Received! Give us a few hours to review your application.');
}
  
  //Save deposit requests
  public function savedeposit(Request $request){

      $this->validate($request, [
      'proof' => 'mimes:jpg,jpeg,png|max:4000',
      ]);
        
        $settings=settings::where('id','1')->first();
        
        //screenshot
        $img=$request->file('proof');
        $upload_dir="./$settings->files_key/cloud/uploads";
        
        $image=$img->getClientOriginalName();
        $move=$img->move($upload_dir, $image);
        //end screenshot process
        
        if($request['pay_type']=='plandeposit'){
          //add the user to this plan for approval
          users::where('id',Auth::user()->id)
          ->update([
            'plan'=> $request['plan_id'],
          ]);
          $plan=$request['plan_id'];
        }elseif($request['pay_type'] == 'Subscription Trading'){
          $plan="Subscription Trading";
        }
        else{
          $plan=Auth::user()->plan;
        }
       
    $dp=new deposits();

    $dp->amount= $request['amount'];
    $dp->payment_mode= $request['payment_mode'];
    $dp->status= 'Pending';
    $dp->proof= $image;
    $dp->plan= $plan;
    $dp->user= Auth::user()->id;
    $dp->save();

    // Kill the session variables
    $request->session()->forget('plan_id');
    $request->session()->forget('pay_type');
    $request->session()->forget('payment_mode');
    $request->session()->forget('amount');

  return redirect()->route('deposits')
  ->with('message', 'Action Sucessful! Please wait for system to validate this transaction.');
}


    //Save withdrawal requests
     public function withdrawal(Request $request){
            //get settings
            $settings=settings::where('id','1')->first();
            
             if($settings->enable_kyc =="yes"){
                if(Auth::user()->account_verify != "Verified"){
                    return redirect()->back()->with('message','Your account must be verified before you can make withdrawal.');
                }
             }
            
            $method=wdmethods::where('id',$request['method_id'])->first();
            $charges_percentage = $request['amount'] * $method->charges_percentage/100;
            $to_withdraw = $request['amount'] + $charges_percentage + $method->charges_fixed;
            //return if amount is lesser than method minimum withdrawal amount
            

            if(Auth::user()->account_bal < $to_withdraw){
               return redirect()->back()
            ->with('message', 'Sorry, your account balance is insufficient for this request.'); 
            }
            
            if($request['amount'] < $method->minimum){
               return redirect()->back()
            ->with("message", "Sorry, The minimum amount is $settings->currency$method->minimum."); 
            }
            
            //get user last investment package
            $last_user_plan=user_plans::where('user',Auth::user()->id)
            ->where('active','yes')
            ->orderby('activated_at','ASC')->first();
            
            /*if(count($last_user_plan) < 1){
                return redirect()->back()->with('message','You can not make withdrawal yet. You must have an investment running.');
            }*/
            
           //if 30 days has reached since activation
           /*if($last_user_plan->activated_at->diffInDays() < 30){
               return redirect()->back()->with('message','Your investment(s) is not due for withdrawal yet. You must wait till 30 days after your last investment.');
           }*/
           
          //get user
         $user=users::where('id',Auth::user()->id)->first();
         
         $amount= $request['amount'];
         $ui = $user->id;

         if(empty($user->btc_address) && empty($user->ltc_address) && empty($user->eth_address) && empty($user->account_no)){
          return redirect()->route('acountdetails')
          ->with('message', 'You must set up your coins wallet address before you can withdraw.');
        }
         
         //debit user
         users::where('id',$user->id)
          ->update([
          'account_bal' => $user->account_bal-$to_withdraw,
          ]);
      
         //send notification
         $settings=settings::where('id', '=', '1')->first();
        
        //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = "This is to inform you that a successful withdrawal has just occured on your account. Amount: $settings->currency$amount.";
        $objDemo->sender = $settings->site_name;
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject ="Successful withdrawal";
            
       // Mail::bcc($user->email)->send(new NewNotification($objDemo));
         
         if($request['payment_mode']=='Bitcoin'){
            if(empty($user->btc_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your coins wallet address before you can withdraw.');
            }
          $payment_mode = "Bitcoin";
          $coin="BTC"; 
          $wallet=$user->btc_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }elseif($request['payment_mode']=='Ethereum'){
            if(empty($user->eth_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your coins wallet address before you can withdraw.');
            }
          $payment_mode = "Ethereum";
          $coin="ETH"; 
          $wallet=$user->eth_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }elseif($request['payment_mode']=='Litecoin'){
            if(empty($user->ltc_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your coins wallet address before you can withdraw.');
            }
          $payment_mode = "Litecoin";
          $coin="LTC";  
          $wallet=$user->ltc_address;
          //create transaction
        //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }else{
             $payment_mode = "Bank transfer";
         }
         //save withdrawal info
            $dp=new withdrawals();
                      
            //$dp->txn_id= $txn_id;         
            $dp->amount= $amount;
            $dp->to_deduct= $to_withdraw;
            $dp->payment_mode= "$payment_mode";
            $dp->status= 'Pending';
            $dp->user= $user->id;
            
            $dp->save();  
            
            return redirect()->back()
          ->with('message', 'Action Sucessful! Please wait for system to process your request.');
         
          
    }

}
