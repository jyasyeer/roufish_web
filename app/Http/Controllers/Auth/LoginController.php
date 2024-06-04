<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        if (request()->as && request()->as == 'penjual') {
            return view('auth.login-penjual');
        };
        if (request()->as && request()->as == 'pembeli') {
            return view('auth.login-pembeli');
        };
        return view('auth.login');
    }

    protected function authenticated()
    {
        if (auth()->user()->role == 'admin') {
            return redirect()->intended('/admin/dashboard');
        }
        if (auth()->user()->role == 'penjual') {
            return redirect()->intended('/penjual/dashboard');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
