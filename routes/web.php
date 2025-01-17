<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Payment\LiqPayResultController;
use App\Http\Middleware\SetLangAdminMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', [AuthController::class, 'login'])->name('login')->middleware(SetLangAdminMiddleware::class);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget_password');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
});

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::match(['get', 'post'], 'liqpay/result/', LiqPayResultController::class)->name('public.liqpay.result');
