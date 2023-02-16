<?php

use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('soal', SoalController::class);

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/{id}/edit', [UserController::class, 'edit']);
Route::get('/user/{id}/hapus', [UserController::class, 'hapus']);
Route::get('/user/json', [UserController::class, 'json'])->name('user.json');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
