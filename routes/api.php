<?php

use App\Http\Controllers\api\user\authController;
use App\Http\Controllers\studentController;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('students', studentController::class);

route::controller(authController::class)->group(function(){
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});




Route::middleware('auth:sanctum')->group(function () {
    Route::controller(authController::class)->group(function(){
        Route::post('/logout','logout');
        Route::get('/user','user');
    });
});