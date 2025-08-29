<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SampelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login' , [AuthController::class , 'login']);

Route::middleware('auth:sanctum')->prefix('/api')->group(function(){
    Route::post('logout' , [AuthController::class , 'logout']);
    Route::apiResource('contactus' , ContactUsController::class);
    Route::apiResource('aboutus' , AboutUsController::class);
    Route::apiResource('sample' , SampelController::class);
    Route::apiResource('posts' , PostController::class);

});
