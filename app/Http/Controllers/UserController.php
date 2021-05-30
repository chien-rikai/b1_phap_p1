<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ValidateCreation as UserCreate;
use App\Http\Requests\User\ValidateUpdation as UserUpdate;
use App\Http\Requests\User\ValidateChangePass;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        
        $users = $this->userService->index($params);

        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserCreate $request)
    {
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'url_image' => $request->file('url_image') ?? null,
        ];

        $this->userService->store($params);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        if (blank($user)) {
            Session::flash('error', __('message.not_found'));
            return redirect()->route('users.index');
        }

        return view('admin.users.edit')->with([
            'user' => $user
        ]);
    }

    public function update(UserUpdate $request, $id)
    {
        $this->userService->update($request, $id);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if (blank($user)) {
            Session::flash('error', __('message.not_found'));
        }else {
            $this->userService->destroy($user);
        }
       
        return redirect()->route('users.index');
    }

    public function viewChangePass(User $user)
    {
        if (blank($user)) {
            Session::flash('error', __('message.not_found'));
            return back();
        }

        return view('admin.users.change-pass')->with([
            'user' => $user
        ]);
    }

    public function changePass(ValidateChangePass $request, $id)
    {
        $password = $request->input('password');

        $this->userService->changePass($password, $id);

        return redirect()->route('users.index');
    }
}
