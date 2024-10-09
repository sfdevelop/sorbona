<?php

use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\Single\ProfileController;
use App\Http\Controllers\Admin\Single\SettingsController;

Route::view('/start', 'admin/start/start')->name('admin.start');

Route::resource('currency', \App\Http\Controllers\Admin\CurrencyController::class)->names('admin.currency');
Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->names('admin.category');
Route::resource('manufacturer', \App\Http\Controllers\Admin\ManufacturerController::class)->names('admin.manufacturer');
Route::resource('article', \App\Http\Controllers\Admin\ArticleController::class)->names('admin.article');
Route::resource('product', \App\Http\Controllers\Admin\ProductController::class)->names('admin.product');
Route::resource('color', \App\Http\Controllers\Admin\ColorController::class)->names('admin.color');
Route::resource('slider', \App\Http\Controllers\Admin\SliderController::class)->names('admin.slider');
Route::resource('chose', \App\Http\Controllers\Admin\ChoseController::class)->names('admin.chose');
Route::resource('whyChoose', \App\Http\Controllers\Admin\WhyChooseController::class)->names('admin.whyChoose')->only(['index', 'edit', 'update']);
Route::resource('values', \App\Http\Controllers\Admin\ValuesController::class)->names('admin.values');
Route::resource('offer', \App\Http\Controllers\Admin\OfferController::class)->names('admin.offer');
Route::resource('comment', \App\Http\Controllers\Admin\CommentController::class)->names('admin.comment');
Route::resource('orders', \App\Http\Controllers\Admin\OrdersController::class)->names('admin.order')->only(['index', 'show', 'destroy']);
Route::resource('feedback', FeedbackController::class)->names('admin.feedback')->only('index', 'show', 'destroy');
Route::resource('subscribe', \App\Http\Controllers\Admin\SubscribeController::class)->names('admin.subscribe')->only(['index', 'destroy']);

//Route::singleton('mainScreen', MainScreenController::class)->names('admin.mainScreen');
Route::singleton('mainAbout', \App\Http\Controllers\Admin\Single\MainPageController::class)->names('admin.mainAbout');
Route::singleton('pageAbout', \App\Http\Controllers\Admin\Single\AboutPageController::class)->names('admin.pageAbout');
Route::singleton('setting', SettingsController::class)->names('admin.setting');
Route::singleton('profile', ProfileController::class)->names('admin.profile');

Route::singleton('politic', \App\Http\Controllers\Admin\Single\PoliticPageController::class)->names('admin.politic');
Route::singleton('return', \App\Http\Controllers\Admin\Single\ReturnPageController::class)->names('admin.return');
Route::singleton('offerta', \App\Http\Controllers\Admin\Single\OfertaPageController::class)->names('admin.offerta');
