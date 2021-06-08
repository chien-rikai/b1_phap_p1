<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/locale/{locale}', [SettingController::class, 'locale'])->name('setting.locale');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
    Route::get('/falied', [AuthController::class, 'getFalied'])->name('get.falied');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
    Route::get('verify-code', [AuthController::class, 'verifyCode'])->name('verify.code');
    Route::get('reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');
    Route::post('reset', [AuthController::class, 'reset'])->name('reset');


    Route::group(['middleware' => 'login'], function () {
        Route::resource('categories', CategoryController::class);
    });
});