<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected function credentials(Request $request)
    {
    return array_merge($request->only($this->username(), 'password'), ['status' => 'active']);
    }

        
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('Wrong login details or account not activated!')],
        ]);
    }
    /*
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('dashboard');
    }

    
    protected function authenticated(Request $request, $user)
    {
    if ( $user->isAdmin() ) {// do your margic here
        return redirect()->route('dashboard');
    }

    return redirect('/');
    }
    */
    
    //protected $redirectTo = '/dashboard';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
     public function authenticated(Request $request, $user)
    {
        $user = Auth::user();
        $user->token_2fa_expiry = \Carbon\Carbon::now();
        $user->save();

        $request->session()->put('getAnouc', 'true');
        return redirect()->route('dashboard');
    }
     
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
