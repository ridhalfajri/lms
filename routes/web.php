<?php

use App\Http\Controllers\KelasController;
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
// datatable
Route::get('/soal/json', [SoalController::class, 'json'])->name('soal.json');
Route::get('/user/json', [UserController::class, 'json'])->name('user.json');
Route::get('/kelas/json', [KelasController::class, 'json'])->name('kelas.json');

Route::resource('soal', SoalController::class);
Route::resource('kelas', KelasController::class);

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit']);
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'hapus']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard', $data = [
        'title' => 'Dashboard'
    ]);
})->name('dashboard');
