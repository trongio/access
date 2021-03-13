<?php

use App\Http\Controllers\PersonnelTableController;
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

//Route::get('/personnel', function () {
//    return view('personnel');
//});

Route::get('/personnel', [PersonnelTableController::class, 'index']);

Route::get('/logs', function () {
    return view('logs');
});

Route::get('/attendance', function () {
    return view('attendance');
});

//Route::post('/login', 'LoginController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
