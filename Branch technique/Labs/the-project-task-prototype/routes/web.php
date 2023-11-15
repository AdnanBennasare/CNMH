<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

Route::get('/localization/{locale}', LocalizationController::class)->name('localization');

Route::middleware(Localization::class)
->group(function (){
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {

        Route::get('tasks/export', [TaskController::class, 'export'])->name('export.task');
        Route::post('tasks/import', [TaskController::class, 'import'])->name('import.task');

        Route::get('projects/export', [ProjectController::class, 'export'])->name('export.project');
        Route::post('projects/import', [ProjectController::class, 'import'])->name('import.project');

        Route::get('members/export', [UserController::class, 'export'])->name('export.member');
        Route::post('members/import', [UserController::class, 'import'])->name('import.member');

        Route::resource('tasks', TaskController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('members', UserController::class)->except(['edit', 'update']);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('projects.profileEdit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});



