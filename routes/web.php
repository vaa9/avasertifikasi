<?php

use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Models\Vehicle;
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

Route::get('/', [VehicleController::class, 'index']);

Route::get('/vehicle', function () {
    return view('vehicle');
});

Route::get('/createvehicle', function () {
    return view('createvehicle');
});

Route::get('/editvehicle', function () {
    return view('editvehicle');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/createorder', function () {
    return view('createorder', [
        'customers' => Customer::all(),
        'vehicles' => Vehicle::all(),
    ]);
});

Route::get('/editorder', function () {
    return view('editorder');
});

Route::get('/customer', function () {
    return view('customer');
});

Route::get('/createcustomer', function () {
    return view('createcustomer');
});

Route::get('/editcustomer', function () {
    return view('editcustomer');
});

Route::resource('customer', CustomerController::class);
Route::resource('order', OrderController::class);
Route::resource('vehicle', VehicleController::class);
