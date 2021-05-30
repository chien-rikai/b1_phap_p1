<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;



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
    Route::group(['middleware' => 'has.auth'], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
        Route::get('/falied', [AuthController::class, 'getFalied'])->name('get.falied');
        
        Route::group(['middleware' => 'verify.provider'], function () {
            Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect'])->name('auth.social.redirect');
            Route::get('/auth/callback/{provider}', [SocialController::class, 'callback'])->name('auth.social.callback');
        });
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
    Route::get('verify-code', [AuthController::class, 'verifyCode'])->name('verify.code');
    Route::get('reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');
    Route::post('reset', [AuthController::class, 'reset'])->name('reset');


    Route::group(['middleware' => 'login'], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('user/view/change-pass/{user}', [UserController::class, 'viewChangePass'])->name('user.view.change.pass');
        Route::put('user/change-pass/{id}', [UserController::class, 'changePass'])->name('user.change.pass');
        Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
        Route::get('export/excel/product', [ExportController::class, 'productExcel'])->name('export.excel.product');
        Route::get('export/csv/product', [ExportController::class, 'productCSV'])->name('export.csv.product');

        Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
        Route::get('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('categories/force-destroy/{id}', [CategoryController::class, 'forceDestroy'])->name('categories.force.destroy');

        Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');
        Route::get('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
        Route::delete('products/force-destroy/{id}', [ProductController::class, 'forceDestroy'])->name('products.force.destroy');

        Route::get('members/{member}/history', [MemberController::class, 'history'])->name('members.history');
        
        Route::get('forward-status/{id}', [OrderController::class, 'forward'])->name('forward.status');

        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);
        Route::resource('members', MemberController::class)->only(['index']);
        Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy']);

        # -------------- XMLRequest ------------------ #
        Route::get('/change/product/status/{product}', [ProductController::class, 'changeStatus']);
        Route::get('/change/category/status/{id}', [CategoryController::class, 'changeStatus']);
        
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
    Route::get('/confirm-payment', [SiteController::class, 'confirmPayment'])->name('confirm.payment');
    Route::get('/confirm', [SiteController::class, 'confirm'])->name('confirm');
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