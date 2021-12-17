<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientDataController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [PatientDataController::class, 'index'])->name('profile');
Route::get('/profile/edit', [PatientDataController::class, 'edit'])->name('profile/edit');
Route::put('/profile/update', [PatientDataController::class, 'update'])->name('profile/update');
