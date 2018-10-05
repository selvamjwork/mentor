<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use App\Http\Requests;
use App\Admin;
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

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

       

        $credentials = $this->credentials($request);

        // var_dump($credentials);
        // exit;

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            $this->clearLoginAttempts($request);

            // return $this->authenticated($request, $this->guard()->user())
            //         ?: redirect()->intended($this->redirectPath());
            $adminDetails = Admin::where('email',$request->email)->first();
            // dd($adminDetails->is_activated);
            if ($adminDetails->is_activated =='1') {
                
                $this->authenticated($request, $this->guard()->user());
            }else{
                session()->flash('message',"This account is Deactivated");
                $this->logout($request);
                return $this->sendFailedLoginResponse($request);

            }

            return  redirect('/admin/home');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        // $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
