
$('#sucursales').change(function (e) { 
    //e.preventDefault();
    let idSucursalSeleccionado=$(this).val();
    let textoOptionSeleccionado=$('#sucursales').find("option[value="+idSucursalSeleccionado+"]").text();
    $("#sucursales2 option[value="+idSucursalSeleccionado+"]").attr("selected",true);
    textoOptionSeleccionado=textoOptionSeleccionado.substring(0,textoOptionSeleccionado.indexOf("(")).trim()
    htmlTextoSeleccionado = '<div class="tagSeleccionado">\
                                <div class="cerrarTagSeleccionado" data-id-sucursal='+idSucursalSeleccionado+' id="cerrarTagSeleccionadoSucursal'+idSucursalSeleccionado+'">\
                                    X\
                                </div>\
                                <div class="texto">\
                                    '+textoOptionSeleccionado+'\
                                </div>\
                            </div>';
    $('#sucursalesSeleccionadas').append(htmlTextoSeleccionado); 
});

$(document).on('click', '#sucursalesSeleccionadas .tagSeleccionado .cerrarTagSeleccionado' ,function(){
    let id = $(this).attr("data-id-sucursal");
    $("#sucursales2 option[value="+id+"]").attr("selected",false);
    $(this).parent().remove(); 
});


