<?php

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
});
