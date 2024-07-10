@foreach ($tablas as $tabla)
    {{ $tabla->Tables_in_database.sqlite }}
@endforeach
