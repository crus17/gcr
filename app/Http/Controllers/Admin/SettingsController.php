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

class SettingsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CPTrait;

    
    public function updatewebinfo(Request $request){
     
        $sa=$request['site_address'];

    $this->validate($request, [
      'logo' => 'mimes:jpg,jpeg,png|max:500',
      'favicon' => 'mimes:jpg,jpeg,png|max:500',
      ]);

      $settings = settings::where('id', '=', '1')->first();
        if(empty($request->file('logo'))){
          $image=$settings->logo;
        }else{
         //process logo
        $img=$request->file('logo');
        $upload_dir="../$settings->files_key/cloud/uploads";
        $image=$img->getClientOriginalName();
        $move=$img->move($upload_dir, $image);
        }
        
        if(empty($request->file('favicon'))){
          $favimage=$settings->favicon;
        }else{
         //process favicon
        $favimg=$request->file('favicon');
        $upload_dir="../$settings->files_key/cloud/uploads";
        $favimage=$favimg->getClientOriginalName();
        $move=$favimg->move($upload_dir, $favimage);
        }
        settings::where('id', $request['id'])
        ->update([
        'update'=>$request['update'],
        'site_name'=>$request['site_name'],
        'description'=>$request['description'],
        'keywords'=>$request['keywords'],
        'site_title'=>$request['site_title'],
        'logo'=>$image,
        'favicon'=>$favimage,
        'tawk_to'=>strip_tags($request['tawk_to']),
        'site_address'=>$request['site_address'],
        ]);
        return redirect()->back()
        ->with('message', 'Action Sucessful');
  }

  public function updatepreference(Request $request){

    
    if(isset($request['trade_mode']) and $request['trade_mode']=='on'){
      $trade_mode="on";
    }else{
      $trade_mode="off";
    }

    if(isset($request['annouc']) and $request['annouc']=='on'){
      $annouc="on";
    }else{
      $annouc="off";
    }
    
    
    if(isset($request['enable_2fa']) and $request['enable_2fa']=='yes'){
      $enable_2fa="yes";
    }else{
      $enable_2fa="no";
    }
    
    if(isset($request['enable_kyc']) and $request['enable_kyc']=='yes'){
      $enable_kyc="yes";
    }else{
      $enable_kyc="no";
    }

    
    
    if(isset($request['enable_verification']) and $request['enable_verification']=='true'){
      $enable_verification="true";
      
      //change status column to active on users table
      
      $sql=DB::statement("ALTER TABLE `users` CHANGE `status` `status` VARCHAR(25) DEFAULT 'blocked'"); 
      
    }else{
      $enable_verification="false";
      //change status column to active on users table
      
      $sql=DB::statement("ALTER TABLE `users` CHANGE `status` `status` VARCHAR(25) DEFAULT 'active'"); 
    }

    settings::where('id', $request['id'])
        ->update([
        'contact_email'=>$request['contact_email'],
        'currency'=>$request['currency'],
        's_currency'=>$request['s_currency'],
        'site_preference'=>$request['site_preference'],
        'site_colour'=>$request['site_colour'],
        'enable_verification'=>$enable_verification,
        'trade_mode'=>$trade_mode,
        'enable_2fa'=>$enable_2fa,
        'enable_kyc'=>$enable_kyc,
        'enable_annoc'=>$annouc,
        ]);
        return redirect()->back()
        ->with('message', 'Action Sucessful');
  }

  public function updatebot(Request $request){
    $te=$request['telegram_token'];

    if(isset($request['bot_activate']) && $request['bot_activate']=='true' && $request['site_preference']=="Telegram bot only"){
      $bot_activate="true";
      
      //activate bot
      // create a new cURL resource
      $ch = curl_init();
      
      // set URL and other appropriate options
      curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$te/setWebhook?url=$sa/botman");
      curl_setopt($ch, CURLOPT_HEADER, 0);
      
      // grab URL and pass it to the browser
      curl_exec($ch);
      
      // close cURL resource, and free up system resources
      curl_close($ch);
    }else{
      $bot_activate="false";
      
      //deactivate bot
      // create a new cURL resource
      $ch = curl_init();
      
      // set URL and other appropriate options
      curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$te/deleteWebhook?url=$sa/botman");
      curl_setopt($ch, CURLOPT_HEADER, 0);
      
      // grab URL and pass it to the browser
      curl_exec($ch);
      
      // close cURL resource, and free up system resources
      curl_close($ch);
    }
    

    settings::where('id', $request['id'])
        ->update([

        'telegram_token'=>$request['telegram_token'],
        'bot_activate'=>$bot_activate,
        'bot_group_chat'=>$request['bot_group_chat'],
        'bot_channel'=>$request['bot_channel'],
        'bot_link'=>$request['bot_link'],
        ]);
        return redirect()->back()
        ->with('message', 'Action Sucessful');
  }

  public function updatebotswt(Request $request){
    
    settings::where('id', $request['id'])
        ->update([

        'referral_commission'=>$request['ref_commission'],
        'referral_commission1'=>$request['ref_commission1'],
        'referral_commission2'=>$request['ref_commission2'],
        'referral_commission3'=>$request['ref_commission3'],
        'referral_commission4'=>$request['ref_commission4'],
        'referral_commission5'=>$request['ref_commission5'],
        'signup_bonus'=>$request['signup_bonus'],
        
        ]);
        return redirect()->back()
        ->with('message', 'Action Sucessful');
  }

   //Update Subscription Fees
   public function updatesubfee(Request $request){
     
    settings::where('id', $request['id'])
    ->update([
    'monthlyfee'=>$request['monthlyfee'],
    'quaterlyfee'=>$request['quaterlyfee'],
    'yearlyfee'=>$request['yearlyfee'],
    ]);
    return redirect()->back()
    ->with('message', 'Action Sucessful');
}

public function updatemark(Request $request){

    markets::where('id', $request->id)
      ->update([
        'market'=> $request->mktcatgy,
        'base_curr'=> $request->base_currency,
        'quote_curr'=> $request->quote_currency,
        // 'commission_type'=> $request->commission_type,
        // 'commission_fee'=> $request->commission_fee,
      ]);
        return redirect()->back()
        ->with('message', 'Market Sucessfully Updated');
}

    public function updateasst(Request $request){

    assets::where('id', $request->id)
    ->update([
        'name'=> $request->assname,
        'symbol'=> $request->assym,
        'category'=> $request->ascat,
        // 'commission_type'=> $request->commission_type,
        // 'commission_fee'=> $request->commission_fee,
    ]);
        return redirect()->back()
        ->with('message', 'Asset Sucessfully Updated');
    }

    
    //Add withdrawal and deposit method
    public function addwdmethod(Request $request){
      $method = new wdmethods;
      $method->name=$request['name'];
      $method->minimum=$request['minimum'];
      $method->maximum=$request['maximum'];
      $method->charges_fixed=$request['charges_fixed'];
      $method->charges_percentage=$request['charges_percentage'];
      $method->duration=$request['duration'];
      $method->type=$request['type'];
      $method->status=$request['status'];
      $method->save();
      return redirect()->back()->with('message','Method added successful!');
      
  }
  
  //Update withdrawal and deposit method
  public function updatewdmethod(Request $request){
      
      wdmethods::where('id', $request['id'])
        ->update([
        'name'=>$request['name'],
        'minimum'=>$request['minimum'],
        'maximum'=>$request['maximum'],
        'charges_fixed'=>$request['charges_fixed'],
        'charges_percentage'=>$request['charges_percentage'],
        'duration'=>$request['duration'],
        'type'=>$request['type'],
        'status'=>$request['status'],
        ]);
        return redirect()->back()
        ->with('message', 'Action Successful');
      
  }
  
  //Delete withdrawal and deposit method
  public function deletewdmethod($id){
      wdmethods::where('id',$id)->delete();
      return redirect()->back()->with('message','Withdrawal method deleted successful!');
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

      //save Setttings to DB
      public function updatesettings(Request $request){
        
        /*if($request['payment_mode']=='BTC'){
          $currency='BTC';
        }elseif($request['payment_mode']=='ETH'){
          $currency='ETH';
        }else{
          $currency=$request['currency'];
        }*/
      

        settings::where('id', $request['id'])
        ->update([
        'withdrawal_option'=>$request['withdrawal_option'],
        'payment_mode'=>$request['payment_mode1'].$request['payment_mode2'].
        $request['payment_mode3'].$request['payment_mode4'].$request['payment_mode5'].
        $request['payment_mode6'].$request['payment_mode7'].$request['payment_mode8'],
        'bank_name'=>$request['bank_name'],
        'account_name'=>$request['account_name'],
        'account_number'=>$request['account_number'],
        'btc_address'=>$request['btc_address'],
        'ltc_address'=>$request['ltc_address'],
        'eth_address'=>$request['eth_address'],
        's_s_k'=>$request['s_s_k'],
        's_p_k'=>$request['s_p_k'],
        'pp_ci'=>$request['pp_ci'],
        'pp_cs'=>$request['pp_cs'],
        ]);
        return redirect()->back()
        ->with('message', 'Action Sucessful');
  }

  //save Setttings to DB
  public function updatebasicsettings(Request $request){  

    settings::where('id', $request['id'])
    ->update([
    'payment_mode'=>$request['payment_mode1'].$request['payment_mode2'],
    'bank_name'=>$request['bank_name'],
    'whatsapp'=>$request['whatsapp'],
    'account_name'=>$request['account_name'],
    'account_number'=>$request['account_number'],
    'btc_address'=>$request['btc_address'],
    ]);
    return redirect()->back()
    ->with('message', 'Action Sucessful');
}
  public function updateasset(Request $request){

    $assets = new assets;
    $assets->category=$request['asset_catgy'];
    $assets->name=$request['asset_name'];
    $assets->symbol=$request['asset_symbol'];
    //$assets->commission_type=$request['coom_type'];
    //$assets->commission_fee=$request['com_fee'];
    $assets->save();

    return redirect()->back()
    ->with('message', 'Action Sucessful');
}

public function updatemarket(Request $request){
  $market = new markets;
  $market->market=$request['mktcatgy'];
  $market->base_curr=$request['base_currency'];
  $market->quote_curr=$request['quote_currency'];
 // $market->commission_type=$request['commfee_type'];
  //$market->commission_fee=$request['live_com_fee'];
  $market->save();
  return redirect()->back()
    ->with('message', 'Action Sucessful');
}

public function updatefee(Request $request){

settings::where('id', $request->id)
  ->update([
    'commission_type'=> $request->commission_type,
    'commission_fee'=> $request->commission_fee,
  ]);
return redirect()->back()
  ->with('message', 'Action Sucessful');
}

public function delmarket($id){
markets::where('id',$id)->delete();
return redirect()->back()
        ->with('message', 'Market Sucessfully Deleted');
}

public function delassets($id){
assets::where('id',$id)->delete();
return redirect()->back()
        ->with('message', 'Asset Sucessfully Deleted');
}




}
