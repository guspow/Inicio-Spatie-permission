<?php

use App\Http\Controllers\CompetenciasController;
use Illuminate\Routing\Route as RoutingRoute;
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
    return view('home');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::controller(CompetenciasController::class)->group(function(){
    Route::get('competencias', 'index');
    Route::get('competencias/create', 'create');
    Route::get('competencias/{competencia}', 'show');
});

