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
      let htmlSelect='<select class="form-control" name="id_estado_documento" id="id_estado_documento_nuevo" style="border: solid 2px #EEE30B">\
                        <option value="4">Recibido</option>\
                        <option value="5">Despachado</option>\
                     </select>';
      $("#controlInternoExterno").append(htmlSelect);   
   }else
   {
      $("#id_estado_documento").remove();
      $("#id_estado_documento_nuevo").remove();
      let htmlSelect='<select class="form-control" name="id_estado_documento" id="id_estado_documento_nuevo" style="border: solid 2px #EEE30B">\
                        <option value="1">Recepcionado</option>\
                     </select>';
      $("#controlInternoExterno").append(htmlSelect);
   }
});



/**
 * Funcion que no permite modificar campos al momento de editar un documento registrado
 * edit del registro documento
 */
$(document).ready(function() {  
   if($(location).attr('href').match('/registroDocumento/[0-9]*/edit') !== null)
   {
      let datosJsonSql={
         "_token":$("input[name=_token]").val(),
         "id_documento":$("input[name=id_registro_documento]").val()
      };
      
      $.ajax({
         type: "POST",
         url: "/registroDocumento/query",
         data: datosJsonSql,
         success: function (response) {
            let respuestaJson=JSON.parse(response);
            console.log(respuestaJson);
            $("#num-hoja-ruta").attr("readonly","true");
            $("#fecha-recepcion").attr("readonly","true");
            $("#id_tipo_documento option:not(:selected)").attr("disabled", true);
            if (respuestaJson.fecha_entrega !== null) 
            {
               $("#fec-entrega").attr("readonly",true);
               $("#id_unidad_destino option:not(:selected)").attr("disabled", true);
            }
            if (respuestaJson.fecha_final !== null) 
            {
               $("#fec-final-documento").attr("readonly",true);
            }
            
         },
         error: function(error)
         {
            console.log(error);
         }
      });     
   }
});



/**
 * funcion que manipula la fecha de finalizacion del formuario, esto courre cuando el usuario(con rol ventanilla)
 * selecciona el estado de finalizacion, automaticamente aparece el input de fecha de finalizacion
 */

$(document).ready(function() {
  $("#id_estado_documento ").change(function(){
     if($("#id_estado_documento option:selected").text().toUpperCase() == "finalizado".toUpperCase())
     {
         $("#input-fechaFinal-registroDocumento").removeAttr("hidden");
         $("#input-fechaFinal-registroDocumento").show();
     }
     else{
         $("#input-fechaFinal-registroDocumento").hide(true);
     }
  }); 
});




