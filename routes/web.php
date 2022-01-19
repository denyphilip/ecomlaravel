<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userscsv', [App\Http\Controllers\HomeController::class, 'exportCsv'])->name('userscsv');
Route::get('/ordercsv', [App\Http\Controllers\HomeController::class, 'exportOrderCsv'])->name('ordercsv');
Route::get('/report', [App\Http\Controllers\HomeController::class, 'report'])->name('report');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/orders', [App\Http\Controllers\HomeController::class, 'viewOrder'])->name('orders');
Route::resource('users','UserController');
Route::resource('banners','BannerController');
Route::resource('categories','CategoryController');
Route::resource('products','ProductController');
Route::resource('configurations','ConfigurationController');
Route::resource('coupons','CouponController');
Route::resource('contacts','ContactController');
Route::resource('cms','CmsController');
Route::get('/deleteimages/{id}', [App\Http\Controllers\ProductController::class, 'destroyImage']);
