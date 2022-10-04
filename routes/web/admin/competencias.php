<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function(){
    Route::resource('competencias', CompetenciasController::class)->names('competencias');
});

