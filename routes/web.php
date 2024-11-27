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
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => '/app', 'as' => 'app.', 'middleware' => ['auth']], function(){
    // user dashboard
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('booking', 'App\Http\Controllers\User\BookingController');

    // user history

    // user profile

    Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => ['check_admin']], function(){

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('user', 'App\Http\Controllers\Admin\UserController'); // view, list all, edit, delete

        Route::resource('room', 'App\Http\Controllers\Admin\RoomController'); // view, list all, edit, delete
    });

});

Auth::routes();
