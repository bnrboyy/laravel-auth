<?php


namespace App\Http\Controllers;
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



Route::get('/landing', function () {
    return view('landing');
});


Route::get('/register', function () {
    return view('register');
});


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/landing', function () {
        return view('landing');
    });
});

Route::get('/', [Controller::class, 'index']);


Route::post('/api/auth/register', [UserController::class, 'onRegister']);
Route::post('/api/auth/login', [UserController::class, 'onLogin']);
Route::get('/api/auth/logout', [UserController::class, 'onLogout']);
