<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SettingController extends Controller {
    
    public function locale($locale)
    {
        if (! in_array($locale, ['vi', 'en'])) {
            abort(400);
        }

        App::setLocale($locale);
    }

}