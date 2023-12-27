<?php


use App\Http\Controllers\LocalizationController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProfileController;
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
Route::get('/localization/{locale}', LocalizationController::class)->name('localization');
Route::middleware(Localization::class)
->group(function (){
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('projects', ProjectController::class);
Route::resource('tasks', TasksController::class);
Route::resource('members', UserController::class);




Route::get('projects/export', [ProjectController::class, 'export'])->name('export.project');
Route::post('projects/import', [ProjectController::class, 'import'])->name('import.project');



Route::get('tasks/export', [TasksController::class, 'export'])->name('export.task');
Route::post('tasks/import', [TasksController::class, 'import'])->name('import.task');

Route::get('members/export', [UserController::class, 'export'])->name('export.member');
Route::post('members/import', [UserController::class, 'import'])->name('import.member');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.profileEdit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Auth::routes(['register' => false]);

