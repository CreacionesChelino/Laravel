<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home']);

Route::group(['middleware' => 'auth'], function () {

	Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');
    Route::get('/comprar/{id}/producto', [CartController::class, 'create'])->name('add.cart');
    Route::post('/comprar/{id}/producto', [CartController::class, 'store'])->name('add.store.cart');
    Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
    Route::get('/carrito/{id}/editar', [CartController::class, 'edit'])->name('cart.edit');
    Route::put('/carrito/{id}/editar', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/carrito/{id}/eliminar', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/compras', [SalesController::class, 'index'])->name('compras.index');
    Route::post('/compras/{id}', [SalesController::class, 'store'])->name('compras.store');
    Route::get('/compras/{id}/detalle', [SalesController::class, 'show'])->name('compras.show');
    Route::get('/compras/{id}/editar', [SalesController::class, 'edit'])->name('compras.edit');
    Route::put('/compras/{id}/editar', [SalesController::class, 'update'])->name('compras.update');
    Route::delete('/compras/{id}/eliminar', [SalesController::class, 'destroy'])->name('compras.destroy');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');


    Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categorias', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categorias/{category}/editar', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categorias/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categorias/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/productos', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/productos/crear', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/productos', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/productos/{product}/editar', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/productos/{product}/update', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/productos/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

    Route::get('/ventas', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/ventas/crear', [SalesController::class, 'create'])->name('sales.create');
    Route::post('/ventas', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/ventas/{sale}/editar', [SalesController::class, 'edit'])->name('sales.edit');
    Route::put('/ventas/{sale}/update', [SalesController::class, 'update'])->name('sales.update');
    Route::delete('/ventas/{sale}', [SalesController::class, 'destroy'])->name('sales.destroy');

Route::get('createpaypal',[PayPalPayments::class,'createpaypal'])->name('createpaypal');
Route::post('processPaypal',[PayPalPayments::class,'processPaypal'])->name('processPaypal');
Route::get('processPaypal',[PayPalPayments::class,'processPaypal'])->name('processPaypal');
Route::get('processSuccess',[PayPalPayments::class,'processSuccess'])->name('processSuccess');
Route::get('processCancel',[PayPalPayments::class,'processCancel'])->name('processCancel');
