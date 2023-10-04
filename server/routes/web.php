<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::controller(UserController::class)->group(function () {
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');

    Route::get('/users/login', 'login')->name('users.login');
    Route::post('/users/authenticate', 'authenticate')->name('users.authenticate');

    Route::get('/users/{id}', 'index')->middleware('auth')->name('users.index');
});


Route::controller(ServiceController::class)->group(function () {
    Route::get('/services', 'index')->middleware('auth')->name('services.index');

    Route::post('/services', 'store')->middleware('auth')->name('services.store');

    Route::patch('/services/{id}', 'update')->middleware('auth')->name('services.update');

    Route::delete('/services/{id}', 'destroy')->middleware('auth')->name('services.destroy');
});
