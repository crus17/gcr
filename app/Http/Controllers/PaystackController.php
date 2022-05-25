<?php

namespace App\Http\Controllers;

use App\settings;
use App\users;
use App\user_plans;
use App\plans;
use App\withdrawals;
use App\deposits;
use App\assets;
use App\markets;
use App\cp_transactions;
use App\tp_transactions;
use App\notifications;
use App\wdmethods;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Paystack;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;

use App\Http\Traits\CPTrait;

class PaystackController extends Controller
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
    

      /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);
        $payamount = $paymentDetails['data']['amount'];
        $txn_ref = $paymentDetails['data']['reference'];
        $amount = $payamount/100;
        
        $user=users::where('id',Auth::user()->id)->first();
       
        //save and confirm the deposit
          $dp=new deposits();
          $dp->amount= $amount;
          $dp->txn_id=txn_ref;
          $dp->payment_mode= "Paystack";
          $dp->status= 'Processed';
          $dp->proof= "Paystack";
          $dp->plan= "0";
          $dp->user= $user->id;
          $dp->save();
      
        //add funds to user's account
        users::where('id',$user->id)
        ->update([
        'account_bal' => $user->account_bal + $amount,
        ]);

        //get settings 
        $settings=settings::where('id', '=', '1')->first();
        $earnings=$settings->referral_commission*$amount/100;

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
          
          //credit commission to ancestors
          $deposit_amount = $amount;
          $array=users::all();
          $parent=$user->id;
          $this->getAncestors($array, $deposit_amount, $parent);
          
        }
        
         //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = "$user->name, This is to inform you that your deposit of $settings->currency$amount has been received and confirmed.";
        $objDemo->sender = "$settings->site_name";
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject = "Deposit processed!";
        //Mail::bcc($user->email)->send(new NewNotification($objDemo));

        return redirect()->route('deposits')
        ->with('message', 'Transaction Successful');

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
