<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuscadorController;
use Illuminate\Support\Facades\DB;





Route::get('/buscar' ,[BuscadorController::class, 'buscar'] )->name('buscar');
Route::get('/autocomplete-ciudad', [BuscadorController::class, 'autocompleteCiudad'])->name('autocomplete.ciudad');
Route::get('/autocomplete-tipo', [BuscadorController::class, 'autocompleteTipo'])->name('autocomplete.tipo');



/////ruta para ver tablas luego se elimina


Route::get('/vertablas', function () {

$tablas = DB::select("SELECT name FROM sqlite_master WHERE type='table'");
foreach ($tablas as $tabla) {
    echo $tabla->name . "\n";
}
$nombreTabla = 'inmuebles'; // Reemplaza con el nombre real de tu tabla
$columnas = DB::select("PRAGMA table_info($nombreTabla)");

foreach ($columnas as $columna) {
    echo $columna->name . "\n";
}


});


