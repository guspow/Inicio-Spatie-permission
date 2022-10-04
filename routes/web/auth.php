<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| RUTAS PARA EL ACCESO AL SISTEMA Y RECUPERAR CONTRASEÑA
|--------------------------------------------------------------------------
*/

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login-custom', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('signout', [CustomAuthController::class, 'signOut'])->name('signout');