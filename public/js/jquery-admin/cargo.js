$('#listar-cargos').on('click', function(e){
    e.preventDefault();
    let campocsrf=$("input[name='_token']").val();
    let json={"_token":campocsrf,"id":2,"nombre_cargo":"PERES"};
    //console.log(rutaStorage);
    $.ajax({
        type: "POST",
        url: rutaActualizar,
        data: json,
        //dataType: "json",
        success: function (response) {
            /*$('#eliminar').remove();
            $respuestaEnJson=jQuery.parseJSON(response);
            $.each($respuestaEnJson, function(i, item) {
                console.log(item);
            })
            let htmlCabecera='<div id="eliminar" class="col-xl-5 col-lg-7">\
                        <div class="card shadow mb-4">\
                            <!-- Card Header - Dropdown -->\
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">\
                                <h6 class="m-0 font-weight-bold text-primary">Cargos</h6>\
                            </div>\
                            <!-- Card Body -->\
                            <div class="card-body">\
                                <div class="chart-area">\
                                <table class="table">\
                                <thead class="thead-dark">\
                                <tr>\
                                    <th scope="col">#</th>\
                                    <th scope="col">Cargo</th>\
                                    <th scope="col">Acciones</th>\
                                </tr>\
                                </thead>\
                                <tbody>';
                                let htmlPie='\
                                </tbody>\
                            </table>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
                let htmlCuerpo="";
                $.each($respuestaEnJson, function(i, item) {
                    htmlCuerpo=htmlCuerpo+'<tr>\
                    <th scope="row">'+i+'</th>'+
                    '<td>'+item.nombre_cargo+'</td>'+
                    '<td><a href=""><i class="fa fa-trash">Eliminar</i></a> <a href=""><i class="fa fa-trash">editar</i></a></td>'+
                    '</tr>'
                });
            $('#informacion').append(htmlCabecera+htmlCuerpo+htmlPie);*/
            console.log(response);
        },
        error: function (error){
            console.log(error);
        }
    });
});