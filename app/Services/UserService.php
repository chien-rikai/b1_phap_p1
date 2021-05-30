<?php

namespace App\Services;

use App\Traits\ImageResize;
use App\Repositories\UserRepository;
use Session;
use File;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserService 
{
    use ImageResize;

    public $userRepo;
    
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index($params)
    {
        return $this->userRepo->search($params);
    }

    public function store($params)
    {   
        if (isset($params['url_image'])){
            $filename = Str::slug($params['name']) . time() . '.' . $params['url_image']->getClientOriginalExtension();

            $imageAvatar = $this->uploadImage($params['url_image'], $filename, 'users/avatar', [
                'sizeX' => 100, 
                'sizeY' => 100, 
                'status' => 1, 
                'quality' => 100
            ]);
            $imageDisplay = $this->uploadImage($params['url_image'], $filename, 'users/display', [
                'sizeX' => 200, 
                'sizeY' => 200, 
                'status' => 1, 
                'quality' => 100
            ]);
            
            if (isset($imageAvatar) && isset($imageDisplay)) {
                $params['url_image'] = $filename;
            }
        }

        $user = $this->userRepo->create($params);

        if (blank($user)) {
            Session::flash('error', __('message.error', ['action' => __('common.store'), 'model' => __('common.user')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.store'), 'model' => __('common.user')]));
        }

        return;
    }

    public function update(Request $request, $id)
    {
        $params = [
            'name' => $request->input('name'),
            'url_image' => $request->file('url_image') ?? null,
            'status' => $request->status
        ];

        if (isset($params['url_image'])){
            $filename = Str::slug($params['name']) . time() . '.' . $params['url_image']->getClientOriginalExtension();
      
            $imageAvatar = $this->uploadImage($params['url_image'], $filename, 'users/avatar', [
                'sizeX' => 100, 
                'sizeY' => 100, 
                'status' => 1, 
                'quality' => 100
            ]);
            $imageDisplay = $this->uploadImage($params['url_image'], $filename, 'users/display', [
                'sizeX' => 200, 
                'sizeY' => 200, 
                'status' => 1, 
                'quality' => 100
            ]);

            if (isset($imageAvatar) && isset($imageDisplay)) {
                $user = $this->userRepo->getById($id);

                $delImage = [
                    storage_path('app/public/users/avatar/' . $user->url_image),
                    storage_path('app/public/users/display/' . $user->url_image),
                ];
                
                File::delete($delImage);
                $params['url_image'] = $filename;
            }
        }
        
        $updation = $this->userRepo->update($id, $params);

        if (blank($updation)) {
            Session::flash('error', __('message.error', ['action' => __('common.update'), 'model' => __('common.user')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.update'), 'model' => __('common.user')]));
        }

        return;
    }

    public function destroy(User $user)
    {
        $delImage = [
            storage_path('app/public/users/avatar/' . $user->url_image),
            storage_path('app/public/users/display/' . $user->url_image),
        ];

        File::delete($delImage);

        $deletion = $user->delete();

        if ($deletion) {
            Session::flash('success', __('message.success', ['action' => __('common.destroy'), 'model' => __('common.user')]));
        } else {
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.user')]));
        }

        return;
    }

    public function changePass($password, $id)
    {
        $updation = $this->userRepo->update($id, ['password' => Hash::make($password)]);

        if (blank($updation)) {
            Session::flash('error', __('message.error_change_password'));
        } else {
            Session::flash('success', __('message.success_change_password'));
        }

        return;
    }
}
