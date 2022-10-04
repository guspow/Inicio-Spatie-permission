<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DatatableController;

Route::group(['middleware' => 'auth'], function(){
    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->names('admin.roles');

    Route::get('datatable/users', [DatatableController::class, 'user'])->name('datatable.user');
    Route::post('/cortar', [UserController::class, 'cortar'])->name('user.foto');
});
