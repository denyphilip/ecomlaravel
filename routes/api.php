<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JwtController;

    Route::group(['middleware'=>['jwt']], function ($router) {
        Route::get('profile',[JwtController::class,'profile']);
        Route::post('editprofile',[JwtController::class,'UpdateProfile']);
        Route::post('changepass',[JwtController::class,'changePassword']);
        Route::post('useraddress',[JwtController::class,'userAddress']);
        Route::post('order',[JwtController::class,'order']);
        Route::post('orderproduct',[JwtController::class,'orderProduct']);
        Route::post('usedcoupon',[JwtController::class,'usedCoupon']);
        Route::get('orderdetails/{id}',[JwtController::class,'getOrderDetails']);
    }); 
    Route::post('login',[JwtController::class,'login']);
    Route::post('register',[JwtController::class,'register']);
    Route::post('contact',[JwtController::class,'contact']);
    Route::get('banner',[JwtController::class,'banner']);
    Route::get('category',[JwtController::class,'category']);
    Route::get('category/{id}',[JwtController::class,'show']);
    Route::get('product',[JwtController::class,'product']);
    Route::get('productdetails/{id}',[JwtController::class,'productdetails']);
    Route::get('coupon/{code}',[JwtController::class,'coupon']);
    Route::get('cms',[JwtController::class,'cms']);
    Route::get('cms/{id}',[JwtController::class,'cmsById']);
    Route::get('wishlist/{id}',[JwtController::class,'wishList']);
    Route::post('wishlist',[JwtController::class,'storeWishlist']);
    Route::delete('wishlist/{id}',[JwtController::class,'destroyWishlist']);
