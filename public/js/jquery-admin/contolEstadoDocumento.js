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
     if($(this).find("#idEstadoDocumento").text().toLowerCase().trim() == estadoFinalizado.toLowerCase())
     {
        $(this).css("background",colorRojo);
        $(this).css("color","black");
        $(this).find("#btnEditarDocumento").removeAttr("href");
        $(this).find("#btnElimiarDocumento").attr("disabled",true);
     }
     else if ($(this).find("#idEstadoDocumento").text().toLowerCase().trim() == estadoEntregado.toLowerCase()){
         $(this).css("background",colorAmarillo);
         $(this).css("color","black");
     }
     else if ($(this).find("#idEstadoDocumento").text().toLowerCase().trim() == estadoRecepcionado.toLowerCase()) {
         $(this).css("background",colorVerde);
         $(this).css("color","black");
     }
   });
}
//setInterval(marcarEstadoDocumentoFinalizado,1000);

/**
 * jquery para cuando termine de cargar todo el docuemtno
 * este pueda cambiar los estilos de registro y desabilitar los botones de editar, finalizar y eliminar
 */

$(document).ready(function(){
   marcarEstadoDocumentoFinalizado();
});


/**
 * Funcion jquery para controlar el boton que hace que un documento finalice su estado
 * en pocas palabras cambie de cualquier estado a finalizado
 */
var idRegistroDocumentoAFinalizar
$(".btnEstadoFinalizar").on("click",function(e) {
   e.preventDefault();
   idRegistroDocumentoAFinalizar=$(this).parents("tr").find("td")[0].innerHTML;
   let hojaRutaDelRegistroDocumento=$(this).parents("tr").find("td")[1].innerHTML;
   let tipoDocumentoRegistroDocumento=$(this).parents("tr").find("td")[5].innerHTML;
   let unidadDestinoRegistroDocumento=$(this).parents("tr").find("td")[6].innerHTML;
   let html="<h5>ID: " 
            +idRegistroDocumentoAFinalizar+
            "</h5><h5>Hoja Ruta: "
            +hojaRutaDelRegistroDocumento+
            "<h5>Tipo Documento: "
            +tipoDocumentoRegistroDocumento+
            "<h5>Unidad Destino: "
            +unidadDestinoRegistroDocumento+
            "</h5><br/>";
   $("#ModalBodyEstadoFinalizarDocumento").html(html);
   $("#EstadoFinalizarDocumento").modal("show");
});


/**
 * funcion que cambia los select de la vista index de registro documento
 * Externo => Recibido o Despachado
 * Interno => Los que se tenga en la tabla estado_documentos (Recepcionado, Entregado y Finalizado)
 */

$("#documento_externo_interno").change(function() {
   let procedenciaDocumento=this.value;
   if(procedenciaDocumento.toUpperCase() == "externo".toUpperCase())
   {
      $("#id_estado_documento").remove();
      $("#id_estado_documento_nuevo").remove();
      let htmlSelect='<select class="form-control" name="id_estado_documentoo" id="id_estado_documento_nuevo" style="border: solid 2px #EEE30B">\
                        <option>Recibido</option>\
                        <option>Despachado</option>\
                     </select>';
      $("#controlInternoExterno").append(htmlSelect);   
   }else
   {
      $("#id_estado_documento").remove();
      $("#id_estado_documento_nuevo").remove();
      let htmlSelect='<select class="form-control" name="id_estado_documentoo" id="id_estado_documento_nuevo" style="border: solid 2px #EEE30B">\
                        <option value="1">Recepcionado</option>\
                     </select>';
      $("#controlInternoExterno").append(htmlSelect);
   }
});




