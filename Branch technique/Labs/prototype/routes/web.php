<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProjectController;

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
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('projects', ProjectController::class);
Route::resource('tasks', TasksController::class);



Route::get('projects/export', [ProjectController::class, 'export'])->name('export.project');
Route::post('projects/import', [ProjectController::class, 'import'])->name('import.project');
Auth::routes();
