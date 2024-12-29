<?php

use App\Http\Controllers\Front\Cabinet\CabinetLogoutController;

Route::get('/', \App\Http\Controllers\Front\Cabinet\CabinetInfoController::class)->name('cabinet');
//Route::get('wishlist', \App\Http\Controllers\Front\Cabinet\CabinetWishlistController::class)->name('wishlist');
//Route::get('orders', \App\Http\Controllers\Front\Cabinet\OrdersController::class)->name('orders');
//Route::get('order/{order}', \App\Http\Controllers\Front\Cabinet\OrderController::class)->name('order');
//
//Route::view('change-password', 'front/cabinet/changePassword/change_password')->name('change.password');
//
Route::post('/logout', CabinetLogoutController::class)->name('cabinet.logout');
