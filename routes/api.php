<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\TrainerController;
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\TestimonialController;

//Public route
Route::post('v1/register', [AuthController::class, 'register']);
Route::post('v1/login', [AuthController::class, 'login']);

Route::prefix('v1/')->group(function () {
    //Admin
    Route::middleware(['auth:sanctum', 'adminMiddleware'])->group(function () {
        //user route
        Route::resource('users', UserController::class)->only('store', 'show', 'update', 'index');

        //role route
        Route::get('/roles', [RoleController::class, 'index']);

        //payment route
        Route::resource('payments', PaymentController::class);

        //appointment route
        Route::apiResource('appointments', AppointmentController::class);

        //trainer route
        Route::apiResource('/trainers', TrainerController::class);

        //testimonials route
        Route::apiResource('/testimonials', TestimonialController::class);

        //subscription
        Route::resource('subscriptions', SubscriptionController::class);
    });

    //Trainer
    Route::middleware(['auth:sanctum', 'trainerMiddleware'])->group(function () {
        //user route
        Route::resource('users', UserController::class)->only('show', 'update');

    });

    //Student
    Route::middleware(['auth:sanctum', 'studentMiddleware'])->group(function () {
        //subscription route
        Route::post('/users/{id}/subscriptions', [SubscriptionController::class, 'assignSubscription']);
        Route::get('/users/{id}/subscriptions', [SubscriptionController::class, 'getSubscription']);
    });
});

