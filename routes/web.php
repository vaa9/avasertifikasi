<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TruckController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CarController::class,'index']);
Route::get('/createcar', [CarController::class]);
Route::get('/editcar', [CarController::class]);
Route::get('/motorcycle', [MotorcycleController::class]);
Route::get('/createmotorcycle', [MotorcycleController::class]);
Route::get('/editmotorcycle', [MotorcycleController::class]);
Route::get('/truck', [TruckController::class]);
Route::get('/createtruck', [TruckController::class]);
Route::get('/edittruck', [TruckController::class]);
Route::get('/order', [OrderController::class]);
Route::get('/createorder', [OrderController::class]);
Route::get('/editorder', [OrderController::class]);
Route::get('/customer', [CustomerController::class]);
Route::get('/createcustomer', [CustomerController::class]);
Route::get('/editcustomer', [CustomerController::class]);

Route::resource('customer', CustomerController::class);
Route::resource('order', OrderController::class);
Route::resource('car', CarController::class);
Route::resource('motorcycle', MotorcycleController::class);
Route::resource('truck', TruckController::class);