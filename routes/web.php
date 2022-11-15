<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::get('/register',function () {
    return view('register');
});

Route::get('/login',function () {
    return view('login');
});

Route::get('/catalog',function () {
    return view('catalog.list');
});

Route::post('/register/submit', [AuthController::class, 'register'])->name('register-form');
Route::post('/login/submit', [AuthController::class, 'login'])->name('login-form');

Route::get('/catalog', [ProductController::class, 'list']);
Route::get('/catalog/add', [ProductController::class, 'new']);
Route::post('/catalog/add/submit', [ProductController::class, 'add'])->name('products-form');