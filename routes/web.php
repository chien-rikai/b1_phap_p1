<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SiteController;


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
        Route::get('user/view/change-pass/{user}', [UserController::class, 'viewChangePass'])->name('user.view.change.pass');
        Route::put('user/change-pass/{id}', [UserController::class, 'changePass'])->name('user.change.pass');
        Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
        Route::get('export/excel/product', [ExportController::class, 'productExcel'])->name('export.excel.product');
        Route::get('export/csv/product', [ExportController::class, 'productCSV'])->name('export.csv.product');

        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);
        Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy']);
    });
});

Route::prefix('/')->group(function () {
    Route::group(['middleware' => 'has.auth.site'], function () {
        Route::get('/register', [SiteController::class, 'register'])->name('site.register');
        Route::post('/register', [SiteController::class, 'postRegister'])->name('site.post.register');
        Route::get('/login', [SiteController::class, 'login'])->name('site.login');
        Route::post('/login', [SiteController::class, 'postLogin'])->name('site.post.login');
        
    });

    Route::get('/logout', [SiteController::class, 'logout'])->name('site.logout');

    Route::group(['middleware' => 'login.site'], function () {
        Route::get('/member/{member}/history', [SiteController::class, 'history'])->name('site.member.history');
        Route::get('/order/{order}', [SiteController::class, 'order'])->name('site.order');
        Route::get('/member/{member}/profile', [SiteController::class, 'profile'])->name('site.member.profile');
        Route::put('/update/{member}/profile', [SiteController::class, 'updateProfile'])->name('site.update.profile');
    });

    Route::get('/', [SiteController::class, 'home'])->name('site.home');
    Route::get('/cart', [SiteController::class, 'cart'])->name('cart');
    Route::get('/payment', [SiteController::class, 'payment'])->name('payment');
    Route::post('/do-payment', [SiteController::class, 'doPayment'])->name('do.payment');
    Route::get('/payment/success', [SiteController::class, 'paymentSuccess'])->name('site.payment.success');
    Route::get('/collection/{slug?}', [SiteController::class, 'collection'])->name('site.collection');
    Route::get('/product/{slug}', [SiteController::class, 'product'])->name('site.product');
    Route::get('/search', [SiteController::class, 'search'])->name('site.search');
});

Route::prefix('/ajax')->group(function () {
    Route::post('order-status-update', [OrderController::class, 'updateStatus'])->name('order.status.update');
    Route::post('/rating', [SiteController::class, 'rating'])->name('rating');
    Route::post('/add-to-cart', [SiteController::class, 'addToCart'])->name('add.to.cart');
    Route::post('/update-cart', [SiteController::class, 'updateCart'])->name('update.cart');
    Route::get('/remove-out-cart/{id}', [SiteController::class, 'removeOutCart'])->name('remove.out.cart');
});