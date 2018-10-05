<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;


class VerificationController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth', ['except' => ['VerifyEmail']]);       
	}
	public function notVerified(){
		return view('auth.verification.verifyEmail');
	}
	public function VerifyEmail($token ,Request $request)
	{
		$findEmail =  DB::table('email_verify')->where('token','=',$token)->where('role','user')->first();

		if(!empty($findEmail->email)){
			$user = User::where('email','=',$findEmail->email)->first();
			$user->email;
			if ($user->email_verified != 1) {
				$user->email_verified = 1;
				$user->save();
				$request->session()->flash('success', 'Email Verified Successfully');
				
			}else{
				
				$request->session()->flash('message', 'Email Already Verified');
				return redirect('home');	
			}

			\Auth::login($user);
        	return redirect('/products');	
		}
		return view('auth.verification.invalidToken');
	}
	public function resendEmailToken()
	{
		$user = \Auth::user();
		$us = new User();
		$us->sendEmail($user);
		session()->flash('status','Email has been send to '.$user->email);
		return redirect('/home');
	}
}
