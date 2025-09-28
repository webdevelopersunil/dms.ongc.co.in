<?php

namespace App\Http\Controllers\Auth;

use App\Mac;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request as HttpRequest;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function loginForm($token)
    {

        return view('auth.login');

        // $mac = Mac::where('token', $token)->first();

        // if ($mac) {
        //     $mac->token = '';
        //     $mac->save();
        //     return view('auth.login');
        // } else {
        //     $error = "Token Expired! Please login from the DMS Application";
        //     return view('templates.error', compact('error'));
        // }
    }
}
