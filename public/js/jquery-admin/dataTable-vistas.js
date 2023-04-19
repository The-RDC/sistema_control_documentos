  $(document).ready(function () {
    $('#dataTable').DataTable({
        "pageLength": 5,
        "lengthMenu": [ 5, 10, 25, 50, 70 ],
        "language": {
            "sProcessing":    "Procesando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "No se encontraron resultados",
            "sEmptyTable":    "Ningún dato disponible en esta tabla",
            "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Buscar:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "dom": 'B<"clear">lfrtip',
        "buttons": [
            {
                extend: 'pdf', 
                titleAttr: 'Exportar a PDF', 
                text: '<i class="fa fa-file-pdf" aria-hidden="true"> PDF</i>', 
                className: 'btn btn-danger', 
                exportOptions: { columns: ":not(.no-exportar-pdf)" },
                /*Centra la tabla del PDF
                 * customize: function (doc) {
                    doc.content[1].margin = [100, 0, 100, 0] //left, top, right, bottom
                }*/
                title:$(".titulo-datatable-pdf").text(),
                customize: function (doc) {      
                    doc.defaultStyle.fontSize = 10;}
            },            
        ]
    });
    $('.dt-buttons').addClass('text-right');
 });
         