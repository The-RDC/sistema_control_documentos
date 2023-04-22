  $(document).ready(function () {
    let tituloPdf=$(".titulo-datatable-pdf").text().trim().toLowerCase();
    let orientacionHoja="portrait";

    switch (tituloPdf) {
        case "Información de Empleados".toLocaleLowerCase():
            orientacionHoja="landscape";
            break;
        case "Información de Documentos".toLocaleLowerCase():
            orientacionHoja="landscape";
            break;
        default:
            orientacionHoja="portrait";
            break;
    }

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
        "dom": "<'row p-3'<'col-sm-12 col-md-12 d-flex justify-content-end'B>>\
                lfrtip",// "lfrtip",
        "buttons": [
            {
                extend: 'pdf',
                orientation: orientacionHoja,
                pageSize: 'LETTER', 
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
                        doc.content[1].table.widths = orientacionHoja == 'portrait'? Array(doc.content[1].table.body[0].length + 1).join('*').split(''):0;
                        doc.styles.tableBodyOdd.alignment = 'center'; 
                        doc.styles.tableBodyEven.alignment = 'center';
                  }
            },            
        ]
    });
 });
         