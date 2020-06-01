<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $admin_id = Role::where('title','admin')->first()->id;
            if (in_array($admin_id , \auth()->user()->roles()->pluck('roles.id')->toArray())){
                return redirect()->route('panel.dashboard');
            }
            return redirect()->route('website.index');
        }

        return $next($request);
    }
}
