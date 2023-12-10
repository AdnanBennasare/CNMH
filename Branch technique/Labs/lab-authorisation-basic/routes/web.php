<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;

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
    return view('auth.register');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TasksController::class);
});
Route::post('/auth/register', [UserController::class, 'register'])->name('register');
Route::get('/auth/register', [UserController::class, 'registerPage'])->name('registerPage');
Route::get('/auth/login', [UserController::class, 'loginPage'])->name('loginPage');
Route::post('/auth/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

