<?php

namespace App\Http\Controllers;

use App\agents;
use App\users;
use App\settings;
use App\confirmations;
use App\Faqs;
use App\Testimonys;
use App\plans;
use App\user_plans;
use App\account;
use App\deposits;
use App\withdrawals;
use App\notifications;
use App\tp_transactions;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{ 
    

    public function index()
    {
        
        //Daily profit gainers
        $d=\Carbon\Carbon::now()->subDays(1)->toDateTimeString();
        $dpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->
        where('created_at',$d)->get();
        
        //Weekly profit gainers
        $w=\Carbon\Carbon::now()->subWeeks(1)->toDateTimeString();
        $wpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->
        where('created_at',$w)->get();
        
        //sum total deposited
        $total_deposits = DB::table('deposits')->select(DB::raw("SUM(amount) as total"))->
        where('status','Processed')->get();
        
        //sum total withdrawals
        $total_withdrawals = DB::table('withdrawals')->select(DB::raw("SUM(amount) as total"))->
        where('status','Processed')->get();
        
        $settings=settings::where('id', '=', '1')->first();

        $dumb_transactions = $this->fakewithdrawals(50);

        return view('home.index')->with(array(
          'settings' => $settings,
          'total_users' => users::count(),
          'plans' => plans::all(),
          'total_deposits' => $total_deposits,
          'total_withdrawals' => $total_withdrawals,
          'dpgs' => $dpgs,
          'wpgs' => $wpgs,
          'faqs'=> Faqs::orderby('id', 'desc')->get(),
          'test'=> Testimonys::orderby('id', 'desc')->get(),
          'withdrawals' => withdrawals::orderby('id','DESC')->take(7)->get(),
          'deposits' => deposits::orderby('id','DESC')->take(7)->get(),
          'title' => $settings->site_title,
          'mplans' => plans::where('type','Main')->get(),
          'pplans' => plans::where('type','Promo')->get(),
          'dumb_transactions' => $dumb_transactions
        ));
    }

    public static function fakewithdrawals($items){
      $withdrawals = array();
      $payment_status = array('Confirmed', 'Pending', 'Confirmed', 'Confirmed', 'Confirmed', 'Pending', 'Confirmed','Confirmed', 'Confirmed', 'Confirmed', 'Confirmed');
      $btc_addresses = array("bc1q9927cupxa02z9dstvea7vc5jylhnge", "1GXwp2AA9sCVH6YojCQYWoZYgJDex4gua4 ", "bc1qcnvyhtsk8wtsah3x0tevuetauzwmpx", "bc1qulverwzp0w7yn226380x7latem8yll", "3QFWUsUav7QCsQyk4YPPrpofhfJrKp3cEP", "3GmoDxC3xiUqiNgCoRd5kLwxuBEKXiNdgR", "3CmDk6ycJvHKRd7utu28ipE99KNaraQDVU", "1EnyVF8uvKdsaU8j7DmWrX5UEB18f3zyXT", "14P1KwWJWWgNJJx6mnmL1Guty8HntSpFef", "bc1qc4afcpah5dc2wk59u3nyckslspmcgt", "12t58JnGTfQnaQ5Cn16dZkmX8s3n9AUbJ3", "1KxgMxoNr452WdKUg954LeRE9oBA2Gp9iv", "3MrckakGVpTiN4k7BWwcriJThF8PSzgBJA", "36NtYZ6aphDz8HUPcr8YMz3c1dmuadP2KL", "bc1qw96utm7qaa7dswpk2zk0hfmumwnn9k", "32YMi8dbMYbNeGfx47E1zMbKrQ1V7RfvXt", "3H1LMMK5r7sNVD3qZQ5Yye4vSiZw4koxAn", "bc1q0wd0szqevdgupsvxn8heu25f7jweey", "bc1qft8peyuyswfxxeya2pz30f28l8vcwm", "359qe55QteDyTYkA4igPRosXAwghAB82gd", "3KzpPbWSwB1ieEQphxHrZjFvSUUZhcnWrz", "3He4bZ5VYH34TqnL7bp1TwmLERfouMXymK", "bc1qn77xez53uk0gx3y26gvag7eac590ny", "19J7d69SM5MTGuQ9kNemB7QZVcc4wvmFxb", "bc1qjydgf78s9y48nsqv8h0ud8s5urr7yl", "38C7tPcncU6tMq8mofYzZqawuXi9jbvfHx", "bc1qkmqsf6sssh0a79cfpku6td4eqakar8", "36t4kt72fuWLr59THsT9uocWcZfHLa36g8", "3QK21b8K6FPXmSk1PQPiPNZLg6sJmsXgzq", "16h8XQ6Fp2D8B6wzoLbFYqdDGzAtNuTwu6", "17kRVKJ1qhZ7RcVr2LbA7rkDggDKDwL2Np", "1A62pv39TLnPjF5YJVAXgQaKXgV2WVAyfM", "3ACt1YWPzfkL5xkK4GRM6ADtqYk6nKxSR2", "1JSwFYFEPQ2P5wUY49q5m4xoJGjehPhaBL", "bc1qqdyy35rq69g4vqnnggqkp3gkuux6lj", "1CUGJgGozJYQEksnoEke6NooCtsA63Wo7U", "3BfXwF8a65BbEuF1XQsXUTLVbhY7nCS6XE", "bc1qwxuk5ufxjqcm2sru57exnh6sf92dsl", "16Dm39ryCHMKoUrK3DpbvDA7aYqBeKAgv8", "bc1q3q6df90wrwx0rrnwg4dmqp7zq895ug", "3NyBPZWNghegftf3Ldkbg1jae9sUe89mQP", "1DDSJuUVPqLMSPAW6RNXtELhmeRwdrbNt7", "bc1qm6uxjvvspjx09nk89m0npx3tc4cheh", "bc1qwgtykjf977qedln72kuk78ukmpdhrc", "3NEKjK6fYJcQFJRKjbWawhsyUJJb8L3fR5", "3HQxL1mZEGBib5FXkJs2xUVpw8wLaXDDyd", "bc1qy5qwph8fmqapenr54lcneafsh8rl63", "3GfW4aqsBBmiQUBNizkvGEJDr5GiHqAVPz", "bc1qghg2kgsg9tjkf2f9llgd5nhdt78tz6", "bc1q0xwcghyj7jhukq88ft05kftlel7ypj", "3HeGkqeZMc67onVrWNj4z4AF3aWPyj4y3y", "bc1qyfp72mrp44l4cmcp7gz9h7733z89f3", "bc1qx2tvmem5wc020u7599m3xnr4upl3gj", "1PJFvErsbv9xCeeTnWviJFd98j2AuKF2Dd", "3HhDvH7YMiuWDbNyML29SoxtyPh3b7RHhV", "1PsBwvU32Kqg5sPUyLAfgbTgWfQowuUisj", "bc1qw7zzxhqs7sdwv48awwuf70xk76pxyw", "1JXMtWFEEEYST8oqGHXyvjKznMKWGis6kM", "3GaSC1gUTFpPua5HYWXBqsDEkBrRex132o", "1Q4FHwHDGYB4QBxLTzrHikQPTw6UgBRFGK", "3DQ3tAEFYPST7hyKs6iiMrKF53Q2ppQReb", "38Jpkn54YkXUipJG8bVQE8xjwfonBkPR6z", "3EijicwTNqRVkLkWdtqq8LgBmCWqngk4W3", "3Jsarm5iAVH1FuDwgCbLA3qkut4hB1r8Rb", "3E2MpD2ssPLihnNFYpRzgfPW3KwxaBGHC8", "3Q97fQVfAAcBENLMgyPikMEdKgcNdhgP2v", "3Q26A93HqfZ54kt8LBstkqJ3g5k9wUhuMV", "3Qzzx4S6V7nwZbBu1QugjEw9sZaNrHk1S6");
      // status, amount, btc_address
      for($i=0; $i<$items; $i++){
        $status = $payment_status[array_rand($payment_status)];
        $amount = rand(500, 50000);
        $btc_address = $btc_addresses[array_rand($btc_addresses)];

        $withdrawals[$i]->status = $status;
        $withdrawals[$i]->amount = number_format($amount, 2, '.', ',');
        $withdrawals[$i]->btc_address = $btc_address;
      }

      return $withdrawals;
    }
    
    //Pricing and registration route
   public function pricing(){
       
        $settings=settings::where('id', '=', '1')->first();
        return view('home.pricing')
        ->with(array(
            'plans' => plans::all(),
            'mplans' => plans::where('type','Main')->get(),
            'title' => 'Pricing, regulation and registration',
          //'title' => $settings->site_title,
          'settings' => settings::where('id', '=', '1')->first(),
        ));
    }
    
   //Insights route
   public function insight(){
        $settings=settings::where('id', '=', '1')->first();
        return view('home.insight')
        ->with(array(
            'plans' => plans::all(),
            'mplans' => plans::where('type','Main')->get(),
            'title' => 'Insights',
          //'title' => $settings->site_title,
          'settings' => settings::where('id', '=', '1')->first(),
        ));
   }
  
   //Timeline route
   public function timeline(){
        $settings=settings::where('id', '=', '1')->first();
        return view('home.timeline')
        ->with(array(
            'plans' => plans::all(),
            'mplans' => plans::where('type','Main')->get(),
            'title' => 'Timeline',
          //'title' => $settings->site_title,
          'settings' => settings::where('id', '=', '1')->first(),
        ));
   }

    //Licensing and registration route
   public function licensing(){
      
    return view('home.licensing')
    ->with(array(
      'mplans' => plans::where('type','Main')->get(),
          'pplans' => plans::where('type','Promo')->get(),
          'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
          'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
          'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
          'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
          'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
          'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
          'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
          'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
          'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
      'title' => 'Licensing, regulation and registration',
      'settings' => settings::where('id', '=', '1')->first(),
    ));
  }

    //Terms of service route
    public function terms(){
      
      return view('home.terms')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'Terms of Service',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

    //Privacy policy route
    public function privacy(){
      
      return view('home.privacy')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'Privacy Policy',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

     //FAQ route
     public function faq(){
      
      return view('home.faq')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'FAQs',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

     //about route
     public function about(){
      
      return view('home.about')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'About',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

     //Contact route
     public function contact(){
      
      return view('home.contact')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'Contact',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

    

    //send contact message to admin email
    public function sendcontact(Request $request){

      $settings=settings::where('id','1')->first();
      
       $objDemo = new \stdClass();
        $objDemo->message = substr(wordwrap($request['message'],70),0,350);
        $objDemo->sender = "$request->name $request->email";
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject = "Contact message from $settings->site_name";
            
        Mail::bcc($settings->contact_email)->send(new NewNotification($objDemo));

      return redirect()->back()
      ->with('message', ' Your message was sent successfully!');
  
  }

  
	

    //return add account form
    public function accountdetails(Request $request){
      return view('user.updateacct')->with(array(
        'title'=>'Update account details',
        'settings' => settings::where('id', '=', '1')->first()
        ));
    }
    //update account and contact info
    public function updateacct(Request $request){
    
          users::where('id', $request['id'])
          ->update([
          'bank_name' => $request['bank_name'],
          'account_name' =>$request['account_name'], 
          'account_no' =>$request['account_no'], 
          'btc_address' =>$request['btc_address'], 
          'eth_address' =>$request['eth_address'], 
          'ltc_address' =>$request['ltc_address'], 
          ]);
          return redirect()->back()
          ->with('message', 'Withdrawal Info updated Sucessfully');
    }

    //return add change password form
    public function changepassword(Request $request){
      return view('user.changepassword')->with(array('title'=>'Change Password','settings' => settings::where('id', '=', '1')->first()));
    }
   

    //Update Password
    public function updatepass(Request $request){
        if(!password_verify($request['old_password'],$request['current_password']))
        {
          return redirect()->back()
          ->with('message', 'Incorrect Old Password');
        }
        $this->validate($request, [
        'password_confirmation' => 'same:password',
        'password' => 'min:6',
        ]);

          users::where('id', $request['id'])
          ->update([
          'password' => bcrypt($request['password']),
          ]);
          return redirect()->back()
          ->with('message', 'Password Updated Sucessful');
    } 

   
  
  
  
  //activate account route
     public function activate_account($session)
     {
      $user=users::where('act_session',$session)->first();
      $settings=settings::where('id', '=', '1')->first();
      if($user->act_session == $session){
        users::where('id',$user->id)
        ->update([
            'status' => "active",
        ]);  
        
        //display a msg
        echo'<link href="'.asset('css/bootstrap.css').'" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="'.asset('js/bootstrap.min.js').'"></script>';
    return('<meta http-equiv="refresh" content="1; URL={{$settings->site_address}}/login" />
        <div style="border:1px solid #f2f2f2; padding:10px; margin:150px; color:#d0d0d0; text-align:center;">
            <h1>Your account has been successfully verified! You may proceed to login.</h1>
        </div>');
        
      }else{
          //display a msg
           echo'<link href="'.asset('css/bootstrap.css').'" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="'.asset('js/bootstrap.min.js').'"></script>';
    return('<meta http-equiv="refresh" content="1; URL={{$settings->site_address}}/register" />
        <div style="border:1px solid #f2f2f2; padding:10px; margin:150px; color:#d0d0d0; text-align:center;">
            <h1>Details mismatched! Try registration again.</h1>
        </div>');
      }
     }
  

  
  
	
	//Make or remove admin
    public function makeadmin(Request $request, $id, $action){
        if($action=="on"){
            $action = "1";
        }elseif($action == "off"){
            $action = "0";
        }else{
            return redirect()-back()->with('message',"Unknown action!");
        }
        
        users::where('id', $id)
        ->update([
        'type' => $action,
        ]);
        return redirect()->back()
        ->with('message', "User type has been changed successful!.");
  }
  
  //Change user email
    public function chngemail(Request $request){
      $user=users::where('id',$request['user_id'])->first();
      users::where('id', $request['user_id'])
          ->update([
          'email'=> $request['email'],
          ]);
          return redirect()->route('manageusers')
          ->with('message', 'Action Successful!');
    }
    

  public function referuser(){
    $array = users::all();
    return view('user.referuser')->with(array(
      'title'=>'Refer Users',
      'team' => users::where('ref_by',0)->get(),
      'settings' => settings::where('id', '=', '1')->first()));

  }


  //Get downlines level
public function getdownlines($array, $parent = 0, $level = 0) {
  $referedMembers = '';
  foreach ($array as $entry) {
      if ($entry->ref_by == $parent) {
        
        if($level==0){
          $levelQuote= "Direct referral";
        }else{
          $levelQuote= "Indirect referral level $level";
        }

          $referedMembers .= "
          <tr>
          <td> $entry->name $entry->l_name </td> 
          <td> $levelQuote </td>".
          '<td>'. $this->getUserParent($entry->id).'</td>'.
          '<td>'. $this->getUserStatus($entry->id).'</td>
          <td>'. $this->getUserRegDate($entry->id).'</td>
          </tr>';

          $referedMembers .= $this->getdownlines($array, $entry->id, $level+1);
      }

      if($level == 5){
      break;
      }
  }
  return $referedMembers;
}

//Get user Parent
function getUserParent($id) {
  $user = users::where('id',$id)->first();
  $parent = users::where('id',$user->ref_by)->first();
  if($parent){
    return "$parent->name $parent->l_name";
  }else{
  return "null";
  }
}

//Get user status
function getUserStatus($id) {
  $user = users::where('id',$id)->first();

  return $user->status;
}

//Get User Registration Date
function getUserRegDate($id) {
  $user = users::where('id',$id)->first();

  return $user->created_at;
}


    // pay with card option
    public function paywithcard(Request $request, $amount){
      require_once'billing/config.php';
      
      $t_p=$amount*100; //total price in cents

    //session variables for stripe charges
    $request->session()->put('t_p', $t_p);
    $request->session()->put('c_email', Auth::user()->email);
    
    return view('user.payment')->with(array(
        'title'=>'Pay with card',
        't_p' => $t_p,
        'settings' => settings::where('id', '=', '1')->first()));

    echo'<link href="'.asset('css/bootstrap.css').'" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="'.asset('js/bootstrap.min.js').'"></script>';
    return('<div style="border:1px solid #f5f5f5; padding:10px; margin:150px; color:#d0d0d0; text-align:center;"><h1>You will be redirected to your payment page!</h1>
    
    <h4 style="color:#222;">Click on the button below to proceed.</h4>

    <form action="charge" method="post">
    <input type="hidden" name="_token" value="'.csrf_token().'">
      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="'.$stripe['publishable_key'].'"
          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
          data-name="'.$set->site_name.'"
          data-description="Account fund"
          data-amount="'.$t_p.'"
          data-locale="auto">
      </script>
    </form>
    </div>

    ');
    }

    //stripe charge customer
    public function charge(Request $request){
      include'billing/charge.php';

  //process deposit and confirm the user's plan
  //confirm the users plan

  users::where('id',Auth::user()->id)
  ->update([
  'confirmed_plan' => Auth::user()->plan,
  'activated_at' => \Carbon\Carbon::now(),
  'last_growth' => \Carbon\Carbon::now(),
  ]);
    //get plan
    $p=plans::where('id',Auth::user()->plan)->first();
    //get settings 
    $settings=settings::where('id', '=', '1')->first();
    $earnings=$settings->referral_commission*$up/100;

    if(!empty(Auth::user()->ref_by)){
  //increment the user's referee total clients activated by 1
  agents::where('agent',Auth::user()->ref_by)->increment('total_activated', 1);
  agents::where('agent',Auth::user()->ref_by)->increment('earnings', $earnings);
  
  //add earnings to agent balance
          //get agent
          $agent=users::where('id',Auth::user()->ref_by)->first();
          users::where('id',Auth::user()->ref_by)
          ->update([
          'account_bal' => $agent->account_bal + $earnings,
          ]);
          
          //create history
             tp_transactions::create([
            'user' => auth::user()->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
          
          //credit commission to ancestors
          $deposit_amount = $up;
          $array=users::all();
          $parent=Auth::user()->id;
          $this->getAncestors($array, $deposit_amount, $parent);
    }
  

  //save deposit info
  $dp=new deposits();

  $dp->amount= $up;
  $dp->payment_mode= 'Credit card';
  $dp->status= 'processed';
  $dp->proof= 'stripe';
  $dp->plan= Auth::user()->plan;
  $dp->user= Auth::user()->id;
  $dp->save();
  
  return redirect()->route('dashboard')->with('message',"Successfully charged $set->currency$up!");

  echo '<h1 style="border:1px solid #f5f5f5; padding:10px; margin:150px; color:#d0d0d0; text-align:center;">Successfully charged '.$set->currency.''.$up.'!<br/>
  <small style="color:#333;">Returning to dashboard</small>
  </h1>';

  //redirect to dashboard after 5 secs
echo'
  <script>
  window.setTimeout(function(){
    window.location.href = "../";
  }, 5000);
  </script>
    ';
  }
  
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
    

}
