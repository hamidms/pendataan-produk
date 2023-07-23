<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SalesController;

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
    return view('auth.login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout.submit');

Route::group(['middleware' => ['role:customer']], function () {
    Route::get('/customer/dashboard',[CustomerController::class, 'dashboard'])->name('customer.dashboard');

});

Route::group(['middleware' => ['role:staff']], function () {
    Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/customer',[CustomerController::class, 'read'])->name('customer.read');
    Route::get('/customer/create',[CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/store',[CustomerController::class, 'store'])->name('customer.store');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/stock', [ProductController::class, 'stock'])->name('product.stock');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/{cartId}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Route::get('/sales/submit', [SalesController::class, 'submitForm'])->name('sales.submit');
Route::post('/sales/submit', [SalesController::class, 'submitSales'])->name('sales.submit');
Route::get('/sales', [SalesController::class, 'submitForm'])->name('sales.index');
Route::get('/sales/{userId}', [SalesController::class, 'submitForm'])->name('sales.index');
