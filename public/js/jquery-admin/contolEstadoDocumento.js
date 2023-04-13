/**
 * Funcion que captura todos los tr de los registros de documentos, y marcarlos
 * con rojo (toda la linea). Asi tambien desabilita el boton que finaliza el estado de un documento
 */

function marcarEstadoDocumentoFinalizado()
{
   let estadoActualDocumento =$('#idEstadoDocumento').text();
   let estadoParaComparar="Finalizado";
   $("#controlDeEstadoDocumentoParaMarcarlo tr").each( function (indexInArray, valueOfElement) 
   { 
     if($(this).find("#idEstadoDocumento").text() == estadoParaComparar)
     {
        $(this).css("background","#e74c3c");
        $(this).css("color","black");
        $(this).find("#btnEditarDocumento").removeAttr("href");
        $(this).find("#btnEstadoFinalizar").attr("disabled",true);
        $(this).find("#btnElimiarDocumento").attr("disabled",true);
     }
   });
}
//setInterval(marcarEstadoDocumentoFinalizado,5000);
setTimeout(marcarEstadoDocumentoFinalizado,1000);


