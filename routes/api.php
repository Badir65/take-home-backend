<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/news', [NewsController::class, 'getAllNews']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/search', [NewsController::class, 'search']);
Route::middleware('auth:api')->group(function () {
    Route::get('/get-private-data', [AuthController::class, 'getPrivateData']);
});
