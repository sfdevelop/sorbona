<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\CatalogController;
use App\Http\Controllers\Front\ContactsController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ManufacturerItemController;
use App\Http\Controllers\Front\ManufacturersController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\PolicyController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ReturnController;

Route::get('/', HomeController::class)->name('home');
Route::get('manufacturers', ManufacturersController::class)->name('manufacturers');
Route::get('manufacturer/{manufacturer:slug}', ManufacturerItemController::class)->name('manufacturerItem');
Route::get('news', NewsController::class)->name('news');
Route::get('article/{article:slug}', ArticleController::class)->name('article');
Route::get('policy', PolicyController::class)->name('policy');
Route::get('return', ReturnController::class)->name('return');
Route::get('about', AboutController::class)->name('about');
Route::get('category/{category:slug}', CatalogController::class)->name('category');
//Route::get('category/{category:slug}/subcategory', SubcategoryController::class)->name('subcategory');
//Route::get('sale', SaleController::class)->name('sale');
//Route::get('bestseller', BestsellerController::class)->name('bestseller');
////Route::get('about-us', \App\Http\Controllers\Front\AboutController::class)->name('aboutUs');
//Route::get('products-in-category/category/{category:slug}', ProductsInCategoryController::class)->name('filter');
Route::get('product/{product:slug}', ProductController::class)->name('product');
Route::get('login', \App\Http\Controllers\Front\LoginController::class)->name('login');
Route::get('sign-up', \App\Http\Controllers\Front\SignUpController::class)->name('signUp');
//Route::get('cart', \App\Http\Controllers\Front\CartController::class)->name('cart');
Route::get('contacts', ContactsController::class)->name('contacts');
//Route::get('search', \App\Http\Controllers\Front\SearchController::class)->name('search');
//
//Route::view('no-product-cart', 'front/cart/no_product_cart')->name('no_product_cart');
//Route::view('cart-thx', 'front/cart/cart_thx')->name('cart_thx');
//Route::view('cart-thx-error', 'front/cart/cart-thx-error')->name('cart-thx-error');
//Route::view('cart-thx-success', 'front/cart/cart-thx-success')->name('cart-thx-success');

Route::get('recover', \App\Http\Controllers\Front\RecoverController::class)->name('recover');
