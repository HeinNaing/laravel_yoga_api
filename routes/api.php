<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\Dashboard\FoodController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Api\VerifyEmailController;
use App\Http\Controllers\Dashboard\LessonController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\TrainerController;
use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Dashboard\LessonTypeController;
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\SubscriptionController;
use App\Http\Controllers\Client\UserSubscriptionController;
use App\Http\Controllers\Dashboard\LessonTrainerController;
use App\Http\Controllers\Dashboard\AdminSubscriptionController;

//aaa
//Public route
Route::post('v1/register', [AuthController::class, 'register']);
Route::post('v1/login', [AuthController::class, 'login']);
Route::post('/v1/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('v1/forget-password', [ForgetPasswordController::class, 'sendOtp']);
Route::post('v1/resend-otp', [ForgetPasswordController::class, 'resendOtp']);
Route::post('v1/verify-otp', [ForgetPasswordController::class, 'verifyOtp']);
Route::post('v1/reset-password', [ForgetPasswordController::class, 'resetPassword']);
Route::post('v1/verify-email-otp', [VerifyEmailController::class, 'sendEmailVerifyOtp']);
Route::post('v1/verify-email', [VerifyEmailController::class, 'verifyEmail']);

Route::get('v1/auth/{provider}/redirect', [SocialLoginController::class, 'redirect']);

Route::get('v1/auth/{provider}/callback', [SocialLoginController::class, 'callback']);

//Admin route only
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('v1/users', [UserController::class, 'index']);
});

//Admin & Trainer route
Route::prefix('v1/')->group(function () {

    Route::middleware(['auth:sanctum', 'role:admin,trainer'])->group(function () {
        //user route
        Route::resource('users', UserController::class)->only('store', 'show', 'update');

        //role route
        Route::get('roles', [RoleController::class, 'index']);

        //payment route
        Route::resource('payments', PaymentController::class);

        //appointment route
        Route::apiResource('appointments', AppointmentController::class);

        //trainer route
        Route::apiResource('trainers', TrainerController::class);

        //testimonials route
        Route::apiResource('testimonials', TestimonialController::class);

        //subscription
        Route::resource('subscriptions', SubscriptionController::class);

        //subscription user
        Route::resource('subscription-users', AdminSubscriptionController::class);

        //lesson type route
        Route::resource('lesson-types', LessonTypeController::class);

        //lessontrainer route
        Route::post('lesson-trainers', [LessonTrainerController::class, 'assign']);
        Route::delete('lesson-trainers/{id}', [LessonTrainerController::class, 'unassign']);

        //lesson route
        Route::resource('lessons', LessonController::class);

        //food route
        Route::resource('foods', FoodController::class);
    });

    //Student route
    Route::middleware(['auth:sanctum', 'role:student'])->group(function () {
        //subscription route
        Route::get('/users/{id}/subscriptions', [UserSubscriptionController::class, 'index']);
        Route::post('/users/{id}/subscriptions', [UserSubscriptionController::class, 'store']);
    });
});

