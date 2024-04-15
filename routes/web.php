<?php

use App\Http\Controllers\UserController;
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


// Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth']);

Route::get('/', function () {
    return view('dashboard.home');
})->name('home')->middleware('auth');


Route::get('register',  [UserController::class, 'registerPage'])->name('register');
Route::get('login',     [UserController::class, 'loginPage'])->name('login');
Route::post('register', [UserController::class, 'register'])->name('auth.register');
Route::post('login',    [UserController::class, 'login'])->name('auth.login');
Route::post('logout',   [UserController::class, 'logout'])->name('auth.logout')->middleware('auth');
