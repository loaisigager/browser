<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Inmueble;
use Illuminate\Support\Facades\Validator;


class BuscadorController extends Controller
{
    public function buscar(Request $request)
    {
        // Valida que los datos existan
        $validatedData = $request->validate([
            'Ciudad' => 'nullable|string|alpha:ascii',// otra restriccion para que sean solo letras del abecedario seria 'required|alpha'
            'Tipo' => 'nullable|string|regex:/^[A-Za-z\s]+$/',
            'Precio' => 'nullable|string|regex:/^\d+;\d+$/', // Asegura que el precio tenga el formato correcto
        ]);



        // Inicializa la variable de inmuebles como un paginador vacío
        $inmuebles = Inmueble::query()->whereRaw('1 = 0')->paginate(5);

        $tiposDisponibles = [];

        // Verifica si al menos uno de los filtros tiene un valor
        if ($request->filled('Ciudad') || $request->filled('Tipo') || $request->filled('Precio')) {
            // Obtiene los valores de los filtros del formulario
            $ciudad = $request->input('Ciudad');
            $tipo = $request->input('Tipo');
            $precio = $request->input('Precio'); // Esto será un rango, por ejemplo "1000;2000"

            // Divide el rango de precios en mínimo y máximo si existe
            list($precioMin, $precioMax) = $precio ? explode(';', $precio) : [0, PHP_INT_MAX];

            // Realiza la consulta con los filtros aplicados
            $inmuebles = Inmueble::when($ciudad, function ($query) use ($ciudad) {
                return $query->where('Ciudad', $ciudad);
            })
            ->when($tipo, function ($query) use ($tipo) {
                return $query->where('Tipo', $tipo);
            })
            ->when($precio, function ($query) use ($precioMin, $precioMax) {
                return $query->whereBetween('Precio', [$precioMin, $precioMax]);
            })
            ->paginate(5);

            // Si no se encuentran inmuebles, obtener los tipos disponibles en esa ciudad
            if ($inmuebles->total() == 0 && $request->filled('Ciudad')) {
                $tiposDisponibles = Inmueble::where('Ciudad', $ciudad)
                    ->groupBy('Tipo')
                    ->pluck('Tipo');
            }
        }

        // Retorna una vista con los resultados o sin ellos si no hay filtros
        return view('buscar', compact('inmuebles', 'tiposDisponibles'));

    }

    // Función para autocompletar para ciudades
    public function autocompleteCiudad(Request $request)
    {
        $search = $request->get('term');

        $resultCiudades = Inmueble::where('Ciudad', 'LIKE', '%'. $search .'%')
                           ->groupBy('Ciudad')
                           ->pluck('Ciudad');

        return response()->json($resultCiudades);
    }

    // Función para autocompletar para tipos
    public function autocompleteTipo(Request $request)
    {
        $search = $request->get('term');

        $resultTipos = Inmueble::where('Tipo', 'LIKE', '%'. $search .'%')
                        ->groupBy('Tipo')
                        ->pluck('Tipo');

        return response()->json($resultTipos);
    }




}


