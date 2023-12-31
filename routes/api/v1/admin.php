<?php

use App\Http\Controllers\Api\Admin\adminController;
use Illuminate\Support\Facades\Route;

route::controller(adminController::class)->group(function(){
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:admin-api')->group(function () {
    Route::controller(adminController::class)->group(function(){
        Route::post('/logout','logout');
        Route::get('/me','user');
    });
});