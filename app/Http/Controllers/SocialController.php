<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Socialite;
use App\Services\SocialService;

class SocialController extends Controller
{
    public $socicalService;

    const FEILD = [
        'google' => 'google_id',
        'facebook' => 'facebook_id'
    ];

    public function __construct(SocialService $socicalService)
    {
        $this->socicalService = $socicalService;
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function callback($provider)
    {   
        if ($this->socicalService->handleCallback($provider)) {
            return redirect()->route('categories.index');
        }

        return redirect()->route('login');
    }
}
