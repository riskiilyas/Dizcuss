<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [SessionController::class, 'login']);
Route::post('/login', [SessionController::class, 'login_action']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::post('/change_password', [ChangePasswordController::class, 'change_password']);
Route::get('/change_password', [ChangePasswordController::class, 'index']);
Route::get('/users', [UsersController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
