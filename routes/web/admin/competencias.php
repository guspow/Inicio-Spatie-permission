<?php

use Illuminate\Support\Facades\Route;


Route::resource('competencias', CompetenciasController::class)->names('competencias');
