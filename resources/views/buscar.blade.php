<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscador de Inmuebles</title>
        <!--  estilos y scripts , el cdn de boostrap esta aca al igual que el css personalizado-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="{{asset("css/ion.rangeSlider.css") }}" media="screen,projection"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" media="screen,projection"/>

  <style>
    /*  CSS para ocultar los elementos inicialmente--elimina el parpedo de los flex container  #item1 y item2 son los containers child*/
    #item1, #item2 {
        display: none;
    }
  </style>
</head>
<body class="bg-black bg-gradient"><!--Fondo oscuro con degrado cargado de boostrap-->
    <div class="container"><!--Inicio de Flex Container Parent se trabaja en el archivo carpeta public CSS Style-->
       <div id="item1">  <!--Primer Flex Container Child se trabaja en el archivo CSS Style-->
          <h2 style="text-align: center">Nicaragua RealState</h2>
          <form id="Formulario" method="GET" action="{{ route('buscar') }}"><!-- Los datos del formulario se a la ruta Route/buscar que a su vez envia al controlador BuscadorController.php a la funcion buscar para su proceso-->
              @csrf
              <div class="input-field"> <!-- los atributos id y name son importantes para los scripts de autocompletado y ion.slider-->
              <label for="Ciudad">Ciudad:</label>
              <i class="fa-solid fa-building" style="color: blue;"></i> <!--utilizacion de font-awose y sus iconos-->
              <input type="text" id="Ciudad" name="Ciudad" placeholder="Departamento">
             </div>
             <div class="input-field">
               <label for="Tipo">Tipo:</label>
               <i class="fa-solid fa-house" style="color: blue;"></i>
              <input type="text" id="Tipo" name="Tipo" placeholder="Tipo">
             </div>
             <div>
               <label for="Precio">Precio:</label>
               <!-- Aquí puedes integrar ion.rangeSlider para seleccionar el rango de precios utilizando id y name-->
              <input type="text" id="Precio" name="Precio" value="" placeholder="Precio">
             </div>
             <div class="mi-boton">
              <button type="submit" class="btn btn-primary">Buscar</button>
              <a href="{{ route('buscar') }}" class="btn btn-warning ">Limpiar</a> <!--Se manda a llamar la funcion buscar en el controlador para que al hacer click sobre el boton limpiar se borren las busquedas realizadas-->
             </div>
         </form> <!-- Finaliza Formulario-->
      </div>
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
         <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
         <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
         <script type="text/javascript" src="{{asset("js/ion.rangeSlider.min.js")}}"></script> <!-- script ion.rengeSlider.min-->
         <script type="text/javascript" src="{{asset("js/index.js")}}"></script> <!--Inicia el script archivo index.js en la carpeta public-->
         <script>
            $(document).ready(function() {
                // Autocompletado para  Ciudad y aplicacion de Ajax
                $("#Ciudad").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "{{ route('autocomplete.ciudad') }}", // Llama a la funcion  autocomplete-ciudad en el controlador atraves de archivo de rutas web.php autocomplete.ciudad//
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function(data) {
                                response(data);
                            }
                        });
                    },
                    minLength: 2
                 });

                // Autocompletado para Tipo y aplicacion de Ajax
                $("#Tipo").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "{{ route('autocomplete.tipo') }}", // Igual que Ciudad//
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function(data) {
                                response(data);
                            }
                        });
                    },
                    minLength: 2
                });
              // Quita Parpadeo de container flex
                $('#item1').css('display', 'flex');
                $('#item2').css('display', 'flex');
            });
        </script>
         <!--Mostrar Resultados-->
      <div id="item2"> <!-- Segundo Child Flex Container -->
        <div class="scrollable-content">
        <h2>Resultados</h2>
        <p>Se encontraron {{ $inmuebles->total() }} resultados.</p> <!-- $inmuebles es la clase creada en el modelo inmueble.php aca se llama al metodo total de las librerias de Laravel,esto muestra el total de los resultados encontrados-->
        @forelse ($inmuebles as $inmueble)
          <div id="informacion">
          <!-- Muestra la información del inmueble aquí es igual que la descripcion anterior de la clase en el modelo-->
          <p>{{ $inmueble->Tipo }} - {{ $inmueble->Direccion }}</p>
          <p>Precio: ${{ $inmueble->Precio }};Modo de Pago: {{ $inmueble->MododePago }} </p>
          <p>Teléfono: {{ $inmueble->Telefono }}</p>
         </div>
         <!--Manejo de opcion de resultados vacios o cuando ciudad no tiene el tipo escogido de tipo-->
        @empty
          <p>No se encontraron resultados</p>
          @if(!empty($tiposDisponibles)) <!-- Llamado a la variable $tipoDisponibles que es igual al metodo where en el modelo inmueble esto esta en el controlador-->
         <p>Tipos de casa disponibles en {{ request('Ciudad') }}:</p> <!--Llamado de la funcion request de las librerias de Laravel-->
         <ul>
            @foreach ($tiposDisponibles as $tipo)
                <li>{{ $tipo }}</li>
            @endforeach
         </ul>
    @endif
         @endforelse
        <!-- Agregar enlaces de paginación -->
        <div class="d-flex justify-content-center">
        {{ $inmuebles->appends(request()->query())->links() }}
        </div>
       </div>
       </div>
 </div>
        <!-- Como observaran aca es una interaccion entre vista-controlador-ruta es el modelo de Laravel, la logica del back end la tiene el controlador o BuscadorController.php aca-->
</body>
 </html>
