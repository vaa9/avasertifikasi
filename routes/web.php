<?php

use Illuminate\Support\Facades\Route;
use App\Models\admin;
use App\Models\buku;
use App\Models\peminjam;
use App\Models\peminjaman;
use App\Models\login;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminAuthController;
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

Route::get('/', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/createadmin', function () {
    return view('createadmin');
});

Route::get('/editcustomer', function () {
    return view('editcustomer');
});
Route::get('/createbook', function () {
    return view('createbook');
});
Route::get('/createpeminjam', function () {
    return view('createpeminjam');
});
Route::get('/createpeminjaman', function () {
    return view('createpeminjaman')->with([
        'hasilModel' => App\Models\peminjam::all(),
        'bukus' => App\Models\buku::all()
    ]);
});
Route::get('/editpeminjaman', function () {
    return view('editpeminjaman')->with([
        'hasilModel' => App\Models\peminjam::all(),
        'bukus' => App\Models\buku::all()
    ]);
});
Route::get('/peminjam', function () {
    return view('peminjam');
});
Route::get('/buku', function () {
    return view('buku');
});
Route::get('/peminjaman', function () {
    return view('peminjaman');
});
Route::resource('buku', BookController::class);
Route::resource('peminjam', PeminjamController::class);
Route::resource('admin', AdminController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::put('/peminjaman/{id_peminjaman}', 'PeminjamanController@update')->name('peminjaman.update');
// web.php

Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/', [AdminAuthController::class, 'adminAuthenticate'])->name('admin.login');

