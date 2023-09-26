<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.user-create.index');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
});
