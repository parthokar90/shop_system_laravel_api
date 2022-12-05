<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\DashboardController;



/*
|--------------------------------------------------------------------------
| Login and dashboard route
|--------------------------------------------------------------------------
*/
Route::post('/login',[AuthController::class,'login']);
Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware('auth:sanctum');
