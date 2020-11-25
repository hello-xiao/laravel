<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [IndexController::class,'home'])->name('home');
Route::resource('user',UserController::class);

//注册和登录
Route::get('logout', [LoginController::class,'logout'])->name('logout');
Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'store'])->name('login');
