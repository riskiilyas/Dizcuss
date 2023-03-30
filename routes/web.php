<?php

use App\Http\Controllers\SessionController;
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

Route::get('/', [SessionController::class, 'login']);
Route::get('/register', [SessionController::class, 'register']);
Route::post('/register', [SessionController::class, 'store']);
Route::get('/login', [SessionController::class, 'login']);
Route::post('/login', [SessionController::class, 'login_action']);
