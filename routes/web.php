<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('homepage');
});
Route::get('/login', function () {
    return view('admin.auth-login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('admin.auth-register');
});
Route::get('/dashboard', function () {
    return view('admin.layout.main');
});

Route::get('/user-admin', [UserController::class, 'index'])->name('user-admin.index');
Route::get('/user-admin/create', [UserController::class, 'create'])->name('user-admin.create');
Route::post('/user-admin/store', [UserController::class, 'store'])->name('user-admin.store');
Route::get('/user-admin/edit/{id}', [UserController::class, 'edit'])->name('user-admin.edit');
Route::post('/user-admin/edit/{id}', [UserController::class, 'update'])->name('user-admin.update');
Route::get('/user-admin/delete/{id}', [UserController::class, 'destroy'])->name('user-admin.delete');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');