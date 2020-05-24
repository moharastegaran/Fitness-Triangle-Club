<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('panel.auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email_or_phone' => 'required',
            'password' => 'required|string',
        ],[
            'email_or_phone.required' => 'وارد کردن ایمیل یا موبایل الزامی است',
            'password.required' => 'وارد کردن رمز عبور الزامی است'
        ]);

        $usrnm = $request->email_or_phone;
        $key=strpos($usrnm,"@") ? 'email' : 'mobile';
        if($user = \App\User::where($key,$usrnm)->first()) {
            if (Hash::check($request->password, $user->password)) {
                auth()->login($user);
                return redirect()->route('panel.dashboard');
            }else{
                return redirect()->back()->withErrors([
                    'password' => 'رمز عبور وارد شده اشتباه است'
                ]);
            }
        }else{
            return redirect()->back()->withErrors([
                'email_or_phone' => 'ایمیل یا موبایل وارد شده اشتباه است'
            ]);
        }
    }
}
