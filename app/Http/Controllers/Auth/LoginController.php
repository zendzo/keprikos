<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Guard;
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
     * Auth Guard
     * @var
     */
    protected $auth;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => 'logout']);

        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        $username   = $request->get('username');
        $password   = $request->get('password');
        $remember   = $request->get('remember');

        if ($this->auth->attempt([
            'username'  => $username,
            'password'  => $password,
            'activated' => 1,
        ], $remember == 1 ? true : false)) {

            return redirect()->route('user.dashboard')
                ->with('message','Selamat datang '.$username.'!')
                ->with('status', 'success')
                ->with('type','success');
        }
        else {

            return redirect()->back()
                ->with('message','username dan password salah!')
                ->with('status', 'danger')
                ->with('type','error')
                ->withInput();
        }

    }
}
