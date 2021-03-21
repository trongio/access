<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\TableController;
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
|
*/

/*
|--------------------------------------------------------------------------
| EXAPLES
|--------------------------------------------------------------------------
 use App\Http\Controllers\UserController;
 Route::get('/user', [UserController::class, 'index']);
--------------------------------------------------------------------------
    Route::get($uri, $callback);
    Route::post($uri, $callback);
    Route::put($uri, $callback);
    Route::patch($uri, $callback);
    Route::delete($uri, $callback);
    Route::options($uri, $callback);
--------------------------------------------------------------------------
    Route::match(['get', 'post'], '/', function () {
        //
    });

    Route::any('/', function () {
        //
    });
--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logs', function () {
    return view('logs');
});

Route::get('/attendance', function () {
    return view('attendance');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Tables
Route::get('/personnel', [TableController::class, 'personnel']);
Route::get('/logs', [TableController::class, 'logs']);
Route::get('/departments', [TableController::class, 'departments']);
Route::get('/shifts', [TableController::class, 'shifts']);
Route::get('/attendance', [TableController::class, 'attendance']);

//Database manipulation Department
Route::post('delDep', [DepartmentController::class, 'delete']);
Route::post('addDep', [DepartmentController::class, 'add']);

//Database manipulation shifts
Route::post('delShift', [ShiftController::class, 'delete']);
Route::post('addShift', [ShiftController::class, 'add']);

//Loading
Route::get('/loading', function () {
    return view('loading');
});
