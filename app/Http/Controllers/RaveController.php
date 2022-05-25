<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;

use App\Http\Traits\CPTrait;


//use the Rave Facade
use Rave;

class RaveController extends Controller
{
  public function initialize(Request $request) {
    //This initializes payment and redirects to the payment gateway
    //The initialize method takes the parameter of the redirect URL
    // Rave::initialize(route('callback'));  
    switch ($request->method()) {
        case 'POST':
          Rave::initialize(route('callback'));
          break;
        
        case 'GET':
          return redirect()->route('deposits')
            ->with('message', 'Transaction Unsuccessful');
          break;
    }
  }
  
  public function callback(Request $request) {
    
    $obj = json_decode($request->resp,true);
    $txRef = $obj['data']['data']['txRef'];
    $data = Rave::verifyTransaction($txRef);

    $chargeResponsecode = $data->data->chargecode;
    $chargeAmount = $data->data->amount;
    $chargeCurrency = $data->data->currency;

    
    //$amount = 100;
    $amount = $chargeAmount;
    $currency = "USD";

    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") /*&& ($chargeAmount == $amount)*/  && ($chargeCurrency == $currency)) {
    // transaction was successful...
    // please check other things like whether you already gave value for this ref
    // if the email matches the customer who owns the product etc
    //Give Value and return to Success page
    
        /*$paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);
        $payamount = $paymentDetails['data']['amount'];
        $txn_ref = $paymentDetails['data']['reference'];
        $amount = $payamount/100;*/
        
        $user=users::where('id',Auth::user()->id)->first();
       
        //save and confirm the deposit
          $dp=new deposits();
          $dp->amount= $amount;
          $dp->txn_id=txn_ref;
          $dp->payment_mode= "Flutterwave";
          $dp->status= 'Processed';
          $dp->proof= "Flutterwave";
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
    
        // return redirect('/success');
    
    } else {
        //Dont Give Value and return to Failure page
        
        return redirect()->route('deposits')
        ->with('message', 'Transaction Unsuccessful');
        
        // return redirect('/failed');
    }

    // dd($data->data);
  }
}