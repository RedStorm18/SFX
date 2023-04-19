<?php

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
    return view('auth.login');
});

Auth::routes();

//LOGIN AND VERIFICATION
Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');


//HOME PAGE W/ AUTH
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');
Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');
Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);


//ORDERING TRIAL
Route::post('/home',[App\Http\Controllers\HomeController::class, 'create']);
Route::get('/home/{key}/edit',[App\Http\Controllers\EditController::class, 'customer'])->name('edit');
Route::post('/edit/{upd}',[App\Http\Controllers\EditController::class, 'update'])->name('update');
Route::get('/delete/{upd}',[App\Http\Controllers\EditController::class, 'delete']);

//CUSTOMER 
Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customer'])->name('customer')->middleware('user','fireauth');;
Route::post('/home/customer/create',[App\Http\Controllers\RegController::class, 'customer'])->name('c_create');
Route::get('/home/customer/{key}/edit',[App\Http\Controllers\EditController::class, 'customer'])->name('c_edit');


