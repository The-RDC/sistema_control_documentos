var respuestaSqlRegionalEmpresa;
function deteccionDeCambiosSelectoresRegionalEmpresa(elemento)
{
    if ($(elemento).attr("id")=="regional_selector" ) {
        let _csrf_key=$("input[name='_token']").val();
        let regionalSeleccionada=$("#regional_selector").val();
        $.ajax({
            type: "Post",
            url: "/regional/query",
            data: {"_token":_csrf_key,"regional":regionalSeleccionada},
            //dataType: "dataType",
            success: function (response) {
                respuestaJsonRegionalEmpresa=JSON.parse(response);
                $("#empresa_selector").text("");
                $.each(JSON.parse(response), function(i, item) {
                    $("#empresa_selector").append(
                        '<option value="'+ i +'">'+ item.nombre_empresa+'</option>'
                    );
                    console.log(item.nombre_empresa);
                });
            },
            error:function(error){
                console.log(error);
            }
        });
    }else if ($(elemento).attr("id")=="empresa_selector" ) {
        alert("Esto es lo que tienes que pensar");
    }
}

$("select").change(function () {
    deteccionDeCambiosSelectoresRegionalEmpresa($(this));
});

$(document).ready(function(){
    deteccionDeCambiosSelectoresRegionalEmpresa($("#regional_selector")); 
});

