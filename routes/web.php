<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehicleController;

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

Route::get('/', [VehicleController::class,'index']);
Route::get('/createvehicle', [VehicleController::class]);
Route::get('/editvehicle', [VehicleController::class]);
Route::get('/order', [OrderController::class]);
Route::get('/createorder', [OrderController::class]);
Route::get('/editorder', [OrderController::class]);
Route::get('/customer', [CustomerController::class]);
Route::get('/createcustomer', [CustomerController::class]);
Route::get('/editcustomer', [CustomerController::class]);

Route::resource('customer', CustomerController::class);
Route::resource('order', OrderController::class);
Route::resource('vehicle', VehicleController::class);