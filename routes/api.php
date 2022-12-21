<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\front\BrandController;
use App\Http\Controllers\front\CartController;


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


/*
|--------------------------------------------------------------------------
| Login and dashboard route
|--------------------------------------------------------------------------
*/
Route::post('/register',[AuthController::class,'registration']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware('auth:sanctum');


/*
|--------------------------------------------------------------------------
| Product brand route
|--------------------------------------------------------------------------
*/
Route::get('/brand/list',[BrandController::class,'index']);
Route::get('/brand/product/{id}',[BrandController::class,'brandProduct']);

/*
|--------------------------------------------------------------------------
| Product carts route
|--------------------------------------------------------------------------
*/
Route::resource('/carts',CartController::class)->middleware('auth:sanctum');
