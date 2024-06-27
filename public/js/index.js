$(document).ready(function() {
    // Inicializar el control de rango
    $("#Precio").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 100000,
        from: 1000,
        to: 5000,
        prefix: "$",
        onFinish: function (data) {
            // Asegurar que el valor del campo sea en el formato "min;max"
            $("#Precio").val(data.from + ';' + data.to);
        }
    });

    // Validación del formulario si lo deseas, debes incluir el id=buscadorForm en el formulario
    $('#buscadorForm').on('submit', function(event) {
        let ciudad = $('#Ciudad').val().trim();
        let tipo = $('#Tipo').val().trim();
        let precio = $('#Precio').val().trim();

        if (ciudad === "" || tipo === "" || precio === "") {
            alert("Todos los campos son obligatorios.");
            event.preventDefault(); // Detiene el envío del formulario
        }
    });
});
