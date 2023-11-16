<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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
    'Not Allowed';
})->name('danger');

Route::get('/login', [AuthController::class, 'index'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/register', [AuthController::class, 'register'])->name('registerPage');
Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin,doctor']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/user', UserController::class)->middleware('role:admin');
});
Route::group(['as' => 'home'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/shop', [HomeController::class, 'shop'])->name('.shop');
    Route::get('/shop/{id}', [HomeController::class, 'single'])->name('.single');
});
Route::group(['prefix' => 'cart', 'as' => 'cart'], function () {
    Route::get('/', [CartController::class, 'index'])->name('.index');
    Route::post('/add/{id}', [CartController::class, 'addProduct'])->name('.add');
    Route::get('/remove/{id}', [CartController::class, 'removeProduct'])->name('.remove');
});
