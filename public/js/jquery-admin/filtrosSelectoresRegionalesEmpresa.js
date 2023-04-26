$("select").change(function () {
    if ($(this).attr("id")=="sucursal_selector" || $(this).attr("id")=="regional_selector" ) {
        let _csrf_key=$("input[name='_token']").val();
        let regionalSeleccionada=$("#regional_selector").val();
        $.ajax({
            type: "Post",
            url: "/regional/query",
            data: {"_token":_csrf_key,"regional":regionalSeleccionada},
            //dataType: "dataType",
            success: function (response) {
                  
                $.each(JSON.parse(response), function(i, item) {
                    console.log(item.nombre_empresa);
                }); 
            },
            error:function(error){
                console.log(error);
            }
        });
    }
});