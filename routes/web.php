<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuscadorController;




Route::get('/buscar' ,[BuscadorController::class, 'buscar'] )->name('buscar');
Route::get('/autocomplete-ciudad', [BuscadorController::class, 'autocompleteCiudad'])->name('autocomplete.ciudad');
Route::get('/autocomplete-tipo', [BuscadorController::class, 'autocompleteTipo'])->name('autocomplete.tipo');



/////ruta para ver tablas luego se elimina
use Illuminate\Support\Facades\DB;

Route::get('/vertablas', function () {
    $tablas = DB::select('SHOW TABLES');
    return view('vertablas', compact('tablas'));
});


