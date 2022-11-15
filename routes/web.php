<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;
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
Route::get('/register', [AuthController::class, 'register']);
Route::post('/registerUser', [AuthController::class, 'registerUser']);


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginUser', [AuthController::class, 'loginUser']);


Route::get('/logout', [AuthController::class, 'logout']);





    Route::get('/', function () {
        return view('welcome');
});
