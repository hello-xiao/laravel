<?php

use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FollowController;
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

//邮箱验证
Route::get('confirmEmailToken/{token}',[UserController::class,'confirmEmailToken'])->name('confirmEmailToken');

//关注或取关
Route::get('follow/{user}',[UserController::class,'follow'])->name('user.follow');

//更改密码
Route::get('FindPasswordEmail',[PasswordController::class,'email'])->name('FindPasswordEmail');
Route::post('FindPasswordSend',[PasswordController::class,'send'])->name('FindPasswordSend');
Route::get('FindPasswordEdit/{token}',[PasswordController::class,'edit'])->name('FindPasswordEdit');
Route::post('FindPasswordUpdate',[PasswordController::class,'update'])->name('FindPasswordUpdate');

//首页发布
Route::resource('blog',BlogController::class);

//粉丝和关注
Route::get('follower/{user}',[FollowController::class,'follower'])->name('follower');
Route::get('following/{user}',[FollowController::class,'following'])->name('following');
