<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
=======
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
>>>>>>> b9956af (build_users_admin_module)
use App\Http\Requests\User\ValidateCreation as UserCreate;
use App\Http\Requests\User\ValidateUpdation as UserUpdate;
use App\Http\Requests\User\ValidateChangePass;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
use App\Services\UserService;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
=======
use Illuminate\Support\Str;
use Auth;
use Session, File;

class UserController extends Controller
{
    public $userRepo;
    public $imageRepo;

    public function __construct(UserRepository $userRepo,
                                ImageRepository $imageRepository)
    {
        $this->userRepo = $userRepo;
        $this->imageRepo = $imageRepository;
>>>>>>> b9956af (build_users_admin_module)
    }

    public function index(Request $request)
    {
        $params = $request->all();
<<<<<<< HEAD
        
        $users = $this->userService->index($params);
=======
        $users = $this->userRepo->search($params);
>>>>>>> b9956af (build_users_admin_module)

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
<<<<<<< HEAD
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'url_image' => $request->file('url_image') ?? null,
        ];

        $this->userService->store($params);
=======
        $params = $request->all();

        $params['password'] = bcrypt($params['password']);

        if ($request->hasFile('url_image')){
            $slug = Str::slug($params['name']).time();

            $avatar = $request->file('url_image');

            $imageAvatar = $this->imageRepo->uploadImage($avatar, $slug, 'users/avatar', 100, 100, 1, 100);
            $imageDisplay = $this->imageRepo->uploadImage($avatar, $slug, 'users/display', 200, 200, 1, 100);

            if (isset($imageAvatar) && isset($imageDisplay)) {
                $params['url_image'] = $imageAvatar['filename'];
            }
        }

        $user = $this->userRepo->create($params);

        if (blank($user)) {
            Session::flash('error', 'Thêm mới thất bại!');
        } else {
            Session::flash('success', 'Thêm mới thành công!');
        }
>>>>>>> b9956af (build_users_admin_module)

        return back();
    }

    public function show($id)
    {
        //
    }

<<<<<<< HEAD
    public function edit(User $user)
    {
        if (blank($user)) {
            Session::flash('error', __('message.not_found'));
            return redirect()->route('users.index');
=======
    public function edit($id)
    {
        $user = $this->userRepo->getById($id);

        if (blank($user)) {
            Session::flash('error', 'Dữ liệu không tìm thấy');
            return back();
>>>>>>> b9956af (build_users_admin_module)
        }

        return view('admin.users.edit')->with([
            'user' => $user
        ]);
    }

    public function update(UserUpdate $request, $id)
    {
<<<<<<< HEAD
        $params = [
            'name' => $request->input('name'),
            'url_image' => $request->file('url_image') ?? null,
        ];

        $this->userService->update($params, $id);
=======
        $params = $request->all();
        unset($params['_method']);
        unset($params['_csrf']);
        unset($params['_token']);
        unset($params['id']);

        if ($request->hasFile('url_image')){
            $slug = Str::slug($params['name']).time();

            $avatar = $request->file('url_image');

            $imageAvatar = $this->imageRepo->uploadImage($avatar, $slug, 'users/avatar', 100, 100, 1, 100);
            $imageDisplay = $this->imageRepo->uploadImage($avatar, $slug, 'users/display', 200, 200, 1, 100);

            if (isset($imageAvatar) && isset($imageDisplay)) {
                $user = $this->userRepo->getById($id);

                $delImage = [
                    storage_path('app/public/users/avatar/' . $user->url_image),
                    storage_path('app/public/users/display/' . $user->url_image),
                ];

                File::delete($delImage);
                $params['url_image'] = $imageAvatar['filename'];
            }
        }

        $updation = $this->userRepo->update($id, $params);

        if (blank($updation)) {
            Session::flash('error', 'Cập nhật thất bại!');
        } else {
            Session::flash('success', 'Cập nhật thành công!');
        }
>>>>>>> b9956af (build_users_admin_module)

        return redirect()->route('users.index');
    }

<<<<<<< HEAD
    public function destroy(User $user)
    {
        if (blank($user)) {
            Session::flash('error', __('message.not_found'));
        }else {
            $this->userService->destroy($id);
        }
       
        return redirect()->route('users.index');
    }

    public function viewChangePass(User $user)
    {
        if (blank($user)) {
            Session::flash('error', __('message.not_found'));
=======
    public function destroy($id)
    {
        $this->userRepo->delete($id);
        Session::flash('success', 'Xóa tài khoản thành công!');

        return redirect()->route('users.index');
    }

    public function viewChangePass($id)
    {
        $user = $this->userRepo->getById($id);

        if (blank($user)) {
            Session::flash('error', 'Dữ liệu không tìm thấy');
>>>>>>> b9956af (build_users_admin_module)
            return back();
        }

        return view('admin.users.change-pass')->with([
            'user' => $user
        ]);
    }

    public function changePass(ValidateChangePass $request, $id)
    {
<<<<<<< HEAD
        $password = $request->input('password');

        $this->userService->changePass($password, $id);
=======
        $params = $request->all();

        $updation = $this->userRepo->update($id, ['password' => Hash::make($params['password_new'])]);

        if (blank($updation)) {
            Session::flash('error', 'Cập nhật thất bại!');
        } else {
            Session::flash('success', 'Cập nhật thành công!');
        }
>>>>>>> b9956af (build_users_admin_module)

        return redirect()->route('users.index');
    }
}
