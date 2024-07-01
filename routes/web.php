<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuscadorController;





Route::get('/autocomplete-ciudad', [BuscadorController::class, 'autocompleteCiudad'])->name('autocomplete.ciudad');
Route::get('/autocomplete-tipo', [BuscadorController::class, 'autocompleteTipo'])->name('autocomplete.tipo');

