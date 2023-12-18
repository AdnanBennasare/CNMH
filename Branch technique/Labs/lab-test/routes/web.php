<?php

use Illuminate\Support\Facades\Route;
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
use Illuminate\Support\Facades\DB;



// Route::get('/check-pdo-extension', function () {
//     if (extension_loaded('pdo_mysql')) {
//         return 'PDO extension is loaded!';
//     } else {
//         return 'PDO extension is NOT loaded!';
//     }
// });



Route::get('/check-database-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Connected successfully to the database!";
    } catch (\Exception $e) {
        return "Could not connect to the database. Error: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome');
});
Route::resource('tasks', TasksController::class);

