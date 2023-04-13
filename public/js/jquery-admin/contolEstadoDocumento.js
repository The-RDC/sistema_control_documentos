/**
 * Funcion que captura todos los tr de los registros de documentos, y marcarlos
 * con rojo (toda la linea). Asi tambien desabilita el boton que finaliza el estado de un documento
 */

function marcarEstadoDocumentoFinalizado()
{
   let colorRojo="#FA724E";
   let colorAmarillo="#EDFD7C";
   let colorVerde="#12E35F";
   let estadoFinalizado="Finalizado";
   let estadoEntregado="Entregado";
   let estadoRecepcionado="Recepcionado";
   $("#controlDeEstadoDocumentoParaMarcarlo tr").each( function (indexInArray, valueOfElement) 
   { 
     if($(this).find("#idEstadoDocumento").text() == estadoFinalizado)
     {
        $(this).css("background",colorRojo);
        $(this).css("color","black");
        $(this).find("#btnEditarDocumento").removeAttr("href");
        $(this).find("#btnEstadoFinalizar").attr("disabled",true);
        $(this).find("#btnElimiarDocumento").attr("disabled",true);
     }
     else if ($(this).find("#idEstadoDocumento").text() == estadoEntregado){
         $(this).css("background",colorAmarillo);
         $(this).css("color","black");
     }
     else if ($(this).find("#idEstadoDocumento").text() == estadoRecepcionado) {
         $(this).css("background",colorVerde);
         $(this).css("color","black");
     }
   });
}
setInterval(marcarEstadoDocumentoFinalizado,1000);

/**
 * jquery para cuando termine de cargar todo el docuemtno
 * este pueda cambiar los estilos de registro y desabilitar los botones de editar, finalizar y eliminar
 */

$(document).ready(function(){
   marcarEstadoDocumentoFinalizado();
});

