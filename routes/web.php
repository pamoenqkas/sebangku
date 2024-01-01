<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelolaProductController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
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
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');




Route::get('/', [ProductsController::class, 'index'])->name('welcome');

Route::get('/product-card', [ProductsController::class, 'productCard'])->name('males');
Route::get('/kids', [ProductsController::class, 'indexKids'])->name('kids');
Route::get('/females', [ProductsController::class, 'indexFemales'])->name('females');
Route::get('/males', [ProductsController::class, 'indexMales'])->name('males');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/kelola-user', [KelolaUserController::class, 'index'])->name('kelola-user');
Route::post('/kelola-user/{id}', [KelolaUserController::class, 'activateUser'])->name('activate-user');

Route::get('/kelola-product', [KelolaProductController::class, 'index'])->name('kelola-product');
Route::get('/create-product', [KelolaProductController::class, 'create'])->name('create-product');
Route::post('/kelola-product', [KelolaProductController::class, 'store'])->name('tambah-product');
Route::delete('kelola-product/{id}', [KelolaProductController::class, 'destroy'])->name('delete-product');
Route::get('/kelola-product/{id}', [KelolaProductController::class, 'edit'])->name('edit-product'); 
Route::put('kelola-product/{id}', [KelolaProductController::class, 'update'])->name('update-product');

Route::get('/activate-product/{id}', [KelolaProductController::class, 'activateProduct'])->name('activate-product');
Route::get('/deactivate-product/{id}', [KelolaProductController::class, 'deactivateProduct'])->name('deactivate-product');

Route::get('/activate-user/{id}', [KelolaUserController::class, 'activateUser'])->name('activate-user');
Route::get('/deactivate-user/{id}', [KelolaUserController::class, 'deactivateUser'])->name('deactivate-user');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [ProductsController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
