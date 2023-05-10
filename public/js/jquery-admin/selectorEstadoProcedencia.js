$(document).ready(function() {
    $('#select1').change(function() {
        var valor = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/obtener-opciones',
            data: { valor: valor },
            dataType: 'json',
            success: function(opciones) {
                var select2 = $('#select2');
                select2.empty();
                $.each(opciones, function(key, opcion) {
                    select2.append($('<option>', {
                        value: opcion.id,
                        text: opcion.estado_documento
                    }));
                });
            }
        });
    });
});
