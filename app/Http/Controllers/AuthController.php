<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Session;
use App\Http\Requests\Auth\ValidateLogin;
use Illuminate\Support\Facades\Auth;

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
            $_SESSION["ADMIN"]='ADMIN';
            return redirect()->route('categories.index');
        }

        return redirect()->back()->with('error_login', 'Sai tên đăng nhập hoặc mật khẩu');
    }

    public function getFalied()
    {
        return view('admin.auth.falied');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
