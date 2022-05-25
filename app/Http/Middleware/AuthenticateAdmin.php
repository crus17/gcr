<?php

namespace App\Http\Middleware;
use App\Admin;
use App\settings;
use Auth;
use Closure;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
                return $next($request);
            } else {
                return redirect()->route('validate_admin');
            }
    }
}
