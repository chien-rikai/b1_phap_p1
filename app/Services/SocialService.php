<?php

namespace App\Services;

use Socialite;
use Exception;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class SocialService 
{
    public $userRepo;

    const FEILD = [
        'google' => 'google_id',
        'facebook' => 'facebook_id'
    ];

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function handleCallback($provider)
    {
        try {
            $getInfo = Socialite::driver($provider)->user();
          
            $user = self::verifyUser($getInfo, $provider);
            
            Auth::login($user);
        
            return 1;

        } catch (Exception $e) {
            Session::flash('error_login', __('message.error_login_social'));
            return 0;
        }

        return 0;
    }

    private function verifyUser($getInfo, $provider)
    {
        $user = $this->userRepo->getByEmail($getInfo->email);
      
        if (blank($user)) {
            $user = self::newUser($getInfo, $provider);
        }

        if (is_null($user->attributes[self::FEILD[$provider]])) {
            $user->update([self::FEILD[$provider] => $getInfo->id]);
        }

        return $user;
    }

    private function newUser($getInfo, $provider)
    {   
        $params = [
            'name' => $getInfo->name,
            'email' => $getInfo->email,
            'password' => Hash::make("123456"),
            self::FEILD[$provider] => $getInfo->id
        ];

        return $user = $this->userRepo->create($params);
    }
}
