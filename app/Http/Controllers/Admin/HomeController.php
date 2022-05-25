<?php

namespace App\Http\Controllers\Admin;

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
use App\Task;
use App\Images;
use App\Testimonys;
use App\Contents;
use App\assets;
use App\markets;
use App\mt4details;
use App\deposits;
use App\loans;
use App\wdmethods;
use App\withdrawals;
use App\cp_transactions;
use App\tp_transactions;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   
     /**
      * Show Admin Dashboard.
      * 
      * @return \Illuminate\Http\Response
      */
     public function index(){

        //sum total deposited
        $total_deposited = DB::table('deposits')->select(DB::raw("SUM(amount) as count"))->where('status','Processed')->get();
        $pending_deposited = DB::table('deposits')->select(DB::raw("SUM(amount) as count"))->where('status','Pending')->get();
        $total_withdrawn = DB::table('withdrawals')->select(DB::raw("SUM(amount) as count"))->where('status','Processed')->get();
        $pending_withdrawn = DB::table('withdrawals')->select(DB::raw("SUM(amount) as count"))->where('status','Pending')->get();

        $userlist = users::count();
        $activeusers = users::where('status', 'active')->count();
        $blockeusers = users::where('status', 'blocked')->count();
        $plans = plans::count();
        $unverifiedusers = users::where('account_verify', '!=' ,'yes')->count();
      
         return view('admin.dashboard',[
            'title' => 'Admin Dashboard',
            'total_deposited' => $total_deposited,
            'pending_deposited' => $pending_deposited,
            'total_withdrawn' => $total_withdrawn,
            'pending_withdrawn' => $pending_withdrawn,
            'user_count' => $userlist,
            'plans'=> $plans,
            'activeusers' => $activeusers,
            'blockeusers' => $blockeusers,
            'unverifiedusers'=> $unverifiedusers,
            'settings' => settings::where('id', '=', '1')->first(),
        ]);
     }
     //Plans route
    public function plans()
    {
    	return view('admin.plans')
        ->with(array(
        'title'=>'System Plans',
        'plans'=> plans::where('type', 'Main')->orderby('created_at','ASC')->get(),
        'pplans'=> plans::where('type', 'Promo')->get(),
        'settings' => settings::where('id','1')->first(),
        ));
    }

    //Return manage users route
    public function manageusers()
    {
      $pl = plans::all();
      return view('admin.users')
        ->with(array(
        'title'=>'All users',
        'pl'=> $pl,
        'users' => users::orderBy('id', 'desc')->get(),
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }

    
     //Return search route
     public function search(Request $request)
     {
       $pl = plans::all();
       $searchItem=$request['searchItem'];
        $result=users::whereRaw("MATCH(l_name,name,email) AGAINST('$searchItem')")->paginate(10);
       return view('admin.users')
         ->with(array(
           'pl'=> $pl,
         'title'=>'Users search result',
         'users' => $result,
         'settings' => settings::where('id', '=', '1')->first(),
         ));
     }


     //Return search subscription route
     public function searchsub(Request $request)
     {
       $searchItem=$request['searchItem'];
       if($request['type']=='subscription'){
         $result=mt4details::whereRaw("MATCH(mt4_id,account_type,server) AGAINST('$searchItem')")->paginate(10);
       }
       return view('admin.msubtrade')
         ->with(array(
         'title'=>'Subscription search result',
         'subscriptions' => $result,
         'settings' => settings::where('id', '=', '1')->first(),
         ));
     }

       //Return search route for Withdrawals
       public function searchWt(Request $request)
       { 
        $dp = withdrawals::all();
        $searchItem=$request['wtquery'];
        
        $result=withdrawals::where('user', $searchItem)
			->orwhere('amount',$searchItem)
			->orwhere('payment_mode',$searchItem)
			->orwhere('status',$searchItem)
			->paginate(10);
        
        return view('admin.mwithdrawals')
          ->with(array(
          'dp'=> $dp,
          'title'=>'Withdrawals search result',
          'withdrawals' => $result,
          'settings' => settings::where('id', '=', '1')->first(),
          ));
       }

       //Return search route for deposites
      public function searchDp(Request $request)
      { 
        $dp = deposits::all();
        $searchItem=$request['query'];
        $result=deposits::where('user', $searchItem)
			->orwhere('amount',$searchItem)
			->orwhere('payment_mode',$searchItem)
			->orwhere('status',$searchItem)
			->paginate(10);
        
        return view('admin.mdeposits')
          ->with(array(
          'dp'=> $dp,
          'title'=>'Deposits search result',
          'deposits' => $result,
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }
            

      //Return manage withdrawals route
      public function mwithdrawals()
      {
        return view('admin.mwithdrawals')
          ->with(array(
          'title'=>'Manage users withdrawals',
          'withdrawals' => withdrawals::orderBy('id', 'desc')->get(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }

      //Return manage deposits route
      public function mdeposits()
      {
        return view('admin.mdeposits')
          ->with(array(
          'title'=>'Manage users deposits',
          'deposits' => deposits::orderBy('id', 'desc')->get(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }
      
      //Return manage loans route
      public function mloanrequests()
      {
        return view('admin.mloanrequests')
          ->with(array(
          'title'=>'Manage users deposits',
          'loans' => loans::orderBy('id', 'asc')->get(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }

      //Return agents route
      public function agents()
      {
        return view('admin.agents')
          ->with(array(
          'title'=>'Manage agents',
          'users' => users::orderBy('id', 'desc')
               ->get(),
          'agents' => agents::all(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }
      
       //Return view agent route
      public function viewagent($agent)
      {
        return view('admin.viewagent')
          ->with(array(
          'title'=>'Agent record',
          'agent'=> users::where('id',$agent)->first(),
          'ag_r' => users::where('ref_by',$agent)->get(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }

       //return settings form
    public function settings(Request $request){
        include'currencies.php';
        return view('admin.settings')->with(array(
          'settings' => settings::where('id', '=', '1')->first(),
          'wmethods' => wdmethods::where('type', 'withdrawal')->get(),
          'assets' => assets::all(),
          'markets' => markets::all(),
          'cpd' => cp_transactions::where('id', '=', '1')->first(),
          'currencies' => $currencies,
          'title' =>'System Settings'));
        //return view('settings')->with(array('settings' => settings::where('id', '=', '1')->first(),'title' =>'System Settings'));
      }

      public function msubtrade()
      {
        return view('admin.msubtrade')
        ->with(array(
        'subscriptions' => mt4details::orderBy('id', 'desc')->get(),
        'title'=>'Manage Subscription',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
      } 
      
    //return front end management page
    public function frontpage(Request $request){
        return view('admin.frontpage')->with(array(
        'title'=>'Fronten management',
        'faqs' => Faqs::all(),
        'images' => Images::orderBy('id', 'desc')->get(),
        'testimonies' => Testimonys::orderBy('id', 'desc')->get(),
        'contents' => Contents::orderBy('id', 'desc')->get(),
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }

    
  public function adduser(){
    return view('admin.referuser')->with(array(
      'title'=>'Add new Users',
      'settings' => settings::where('id', '=', '1')->first()));
  }

  public function addmanager(){
    return view('admin.addadmin')->with(array(
      'title'=>'Add new manager',
      'settings' => settings::where('id', '=', '1')->first()));
  }
  public function madmin(){
    return view('admin.madmin')->with(array(
      'admins' => Admin::orderby('id', 'desc')->get(),
      'title'=>'Add new manager',
      'settings' => settings::where('id', '=', '1')->first(),

    ));
  }

    //Return KYC route
    public function kyc()
    {
      return view('admin.kyc')
        ->with(array(
        'title'=>'KYC',
        'users' => users::where('id_card','!=', NULL)
        ->where('passport','!=', NULL)->get(),
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }
    
    public function calendar()
    {
      return view('admin.calender')
        ->with(array(
        'title'=>'Create To do List',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }

    public function showtaskpage()
    {
      return view('admin.task')
        ->with(array(
        'admin' => Admin::orderby('id', 'desc')->get(),
        'title'=>'Create a New Task',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }

    public function mtask()
    {
      return view('admin.mtask')
        ->with(array(
        'admin' => Admin::orderby('id', 'desc')->get(),
        'tasks' => Task::orderby('id', 'desc')->get(),
        'title'=>'Manage Task',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }
    public function viewtask()
    {
      return view('admin.vtask')
        ->with(array(
        'tasks' => Task::orderby('id', 'desc')->where('designation', Auth('admin')->User()->id)->get(),
        'title'=>'View my Task',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }

    public function leads()
    {
      return view('admin.leads')
        ->with(array(
        'admin' => Admin::orderBy('id', 'desc')->get(),
        'users' => users::orderby('id', 'desc')->where('user_plan', NULL)->get(),
        'title'=>'Manage New Registered Clients',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }
    public function leadsassign()
    {
      return view('admin.lead_asgn')
        ->with(array(
        'usersAssigned' => users::orderby('id', 'desc')->where([
          ['assign_to', Auth('admin')->User()->id],
          ['cstatus', NULL]
        ])->get(),
        
        'title'=>'Manage New Registered Clients',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }


    public function customer()
    {
      return view('admin.customer')
        ->with(array(
        'users' => users::orderby('id', 'desc')->where('cstatus', 'Customer')->get(),
        'title'=>'Manage New Registered Clients',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    }
     
}
