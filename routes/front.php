<?php

use App\Http\Controllers\Front\BestsellerController;
use App\Http\Controllers\Front\CatalogController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ManufacturerItemController;
use App\Http\Controllers\Front\ManufacturersController;
use App\Http\Controllers\Front\ProductsInCategoryController;
use App\Http\Controllers\Front\SaleController;
use App\Http\Controllers\Front\SubcategoryController;

Route::get('/', HomeController::class)->name('home');
Route::get('manufacturers', ManufacturersController::class)->name('manufacturers');
Route::get('manufacturer/{manufacturer:slug}', ManufacturerItemController::class)->name('manufacturerItem');
//Route::get('category', CatalogController::class)->name('catalog');
//Route::get('category/{category:slug}/subcategory', SubcategoryController::class)->name('subcategory');
//Route::get('sale', SaleController::class)->name('sale');
//Route::get('bestseller', BestsellerController::class)->name('bestseller');
////Route::get('about-us', \App\Http\Controllers\Front\AboutController::class)->name('aboutUs');
//Route::get('products-in-category/category/{category:slug}', ProductsInCategoryController::class)->name('filter');
//Route::get('product/{product:slug}', \App\Http\Controllers\Front\ProductController::class)->name('product');
//Route::get('login', \App\Http\Controllers\Front\LoginController::class)->name('login');
//Route::get('sign-up', \App\Http\Controllers\Front\SignUpController::class)->name('signUp');
//Route::get('cart', \App\Http\Controllers\Front\CartController::class)->name('cart');
//Route::get('contacts', \App\Http\Controllers\Front\ContactsController::class)->name('contacts');
//Route::get('search', \App\Http\Controllers\Front\SearchController::class)->name('search');
//
//Route::view('no-product-cart', 'front/cart/no_product_cart')->name('no_product_cart');
//Route::view('cart-thx', 'front/cart/cart_thx')->name('cart_thx');
//Route::view('cart-thx-error', 'front/cart/cart-thx-error')->name('cart-thx-error');
//Route::view('cart-thx-success', 'front/cart/cart-thx-success')->name('cart-thx-success');
