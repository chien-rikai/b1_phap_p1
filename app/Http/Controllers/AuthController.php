<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Session;
use App\Http\Requests\Auth\ValidateLogin;
use App\Http\Requests\Auth\ValidateForgotPassWord;
use App\Http\Requests\Auth\ValidateResetPassword;
use App\Http\Requests\Auth\ValidateVerifyCode;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        return view('admin.auth.login');
    }

    public function postLogin(ValidateLogin $request)
    {
        $request->flashOnly(['email']);
        $auth = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (Auth::attempt($auth)) {
            session_start();
            return redirect()->route('categories.index');
        }

        Session::flash('error_login', __('message.error_login'));
        return redirect()->route('login');
    }

    // public function getFalied()
    // {
    //     return view('admin.auth.falied');
    // }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotPassword()
    {
        return view('admin.auth.forgot-password');
    }

    public function verifyCode(ValidateForgotPassWord $request)
    {
        Session::put('verify_code', mt_rand(100000, 999999));
        Session::put('email', $request->input('email'));

        Mail::to($request->input('email'))->send(new SendCode());

        return view('admin.auth.verify-code');
    }

    public function resetPassword(ValidateVerifyCode $request)
    { 
        return view('admin.auth.change-password');
    }

    public function reset(ValidateResetPassword $request)
    {   
        $updation = $this->userRepo->changePass(Session::get('email'), $request->input('password'));

        if ($updation <= 0) {
            return back();
        }

        return view('admin.auth.reset-success');
    }    
}
