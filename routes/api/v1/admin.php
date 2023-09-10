<?php

use App\Http\Controllers\Api\Admin\adminController;
use Illuminate\Support\Facades\Route;

route::controller(adminController::class)->group(function(){
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});