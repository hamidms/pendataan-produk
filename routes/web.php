<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// Contoh route untuk customer yang memerlukan login
Route::group(['middleware' => ['role:customer']], function () {
    // Tambahkan route halaman-halaman customer di sini
    // Contoh:
    Route::get('/customer/dashboard', 'CustomerController@dashboard')->name('customer.dashboard');
});

// Contoh route untuk staff yang memerlukan login
Route::group(['middleware' => ['role:staff']], function () {
    // Tambahkan route halaman-halaman staff di sini
    // Contoh:
    Route::get('/staff/dashboard', 'StaffController@dashboard')->name('staff.dashboard');
});

// Contoh route untuk admin yang memerlukan login
Route::group(['middleware' => ['role:admin']], function () {
    // Tambahkan route halaman-halaman admin di sini
    // Contoh:
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});
