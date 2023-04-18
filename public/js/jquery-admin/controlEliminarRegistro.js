var identificadorFormulario;
$("button").click(function(e){
    if ($(this).attr("data-descripcion") == "BorrarRegistroTablas") {
        e.preventDefault();
        identificadorFormulario=$(this).parent("form").attr("id");
        $("#ModalTitleMensajes").text("Precaucion!");
        $("#ModalBodyMensajes").text("Esta seguro de eliminar el registro");
        $("#Mensajes").modal("show");
    }
});

$("#btnModalMensajes").click(function(){
    $("#"+identificadorFormulario).submit();
    $("#Mensajes").modal("hide");
    $("#ModalTitleMensajes").text("");
    $("#ModalBodyMensajes").text("");
});