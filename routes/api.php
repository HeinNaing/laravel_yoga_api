<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\TrainerController;
use App\Http\Controllers\Api\TestimonialController;
//  Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('appointments', AppointmentController::class);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/trainers', TrainerController::class);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/testimonials', TestimonialController::class);
});

Route::get('user',function(){
        return User::all();
});

