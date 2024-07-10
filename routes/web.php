<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuscadorController;
use Illuminate\Support\Facades\DB;





Route::get('/buscar' ,[BuscadorController::class, 'buscar'] )->name('buscar');
Route::get('/autocomplete-ciudad', [BuscadorController::class, 'autocompleteCiudad'])->name('autocomplete.ciudad');
Route::get('/autocomplete-tipo', [BuscadorController::class, 'autocompleteTipo'])->name('autocomplete.tipo');



