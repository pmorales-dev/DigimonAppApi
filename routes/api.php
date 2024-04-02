<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/login', [AuthController::class, 'verified'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout'])->middleware('auth:api');

// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')
//     ->name('verification.verify');

Route::controller(VerificationController::class)->group(function() {
    // Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    // Route::post('/email/resend', 'resend')->name('verification.resend');
});

Route::post('/store',[LoginRegisterController::class,'store']);
Route::post('/verifyEmail', [VerificationController::class,'index']);
