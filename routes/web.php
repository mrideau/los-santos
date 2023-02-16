<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlacesController;
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
    return view('home');
})->name('home');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact');

Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');// ->middleware("throttle:5,5");
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('/places', PlacesController::class);

Route::middleware('auth')->prefix('admin')->group(function () {
  Route::get('/', function () {
    return view('admin.dashboard');
  })->name('admin.dashboard');
});
