<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatatableController;

Route::resource('users', UserController::class)->names('users');

Route::get('datatable/users',[DatatableController::class, 'user'])->name('datatable.user');

