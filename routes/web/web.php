<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\CompetenciasController;

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

// Route::get('/admin', function () {
//     return view('layouts.admin');
// });
Route::group(['middleware' => 'auth'], function(){
Route::get('home', [HomeController::class, 'home'])->name('home');
});