<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Models\Booking;
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
Route::get('login',[HomeController::class,'login_admin'])->name('login');
Route::post('login',[HomeController::class,'post_login_admin'])->name('post_login_admin');
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('/',[HomeController::class,'dashbaord'])->name('dashboard');
    Route::resource('/booking',BookingController::class);
    Route::get('logout',[HomeController::class,'logout'])->name('logout');
    Route::get('profile',[HomeController::class,'profile'])->name('profile');
    Route::post('update_profile',[HomeController::class,'update_profile'])->name('update_profile');
});

// Auth::routes();
Route::get('dawnalod/{code}',[BookingController::class,'pdf'])->name('pdf');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
