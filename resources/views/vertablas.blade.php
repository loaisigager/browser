<!-- resources/views/vertabla.blade.php -->
<html>
    <head>
        <title>Tablas y Columnas</title>
    </head>
    <body>
        <h1>Tablas existentes:</h1>
        <ul>
            @foreach ($tablas as $tabla)
                <li>{{ $tabla->name }}</li>
            @endforeach
        </ul>

        <h1>Columnas de {{ $nombreTabla }}:</h1>
        <ul>
            @foreach ($columnas as $columna)
                <li>{{ $columna->name }}</li>
            @endforeach
        </ul>
    </body>
</html>
