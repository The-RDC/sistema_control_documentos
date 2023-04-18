@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Informacion de Documentos</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="container">
                <form method="GET" action="{{ route('users.index') }}">
                    <label for="name">Empresa:</label>
                    <select name="name">
                        <option value="">Todos</option>
                        <option value="Juan">Juan</option>
                        <option value="Pedro">Pedro</option>
                        <option value="Maria">Maria</option>
                    </select>

                    <label for="age">Regional:</label>
                    <select name="age">
                        <option value="">Todas</option>
                        <option value="18">18 años o menos</option>
                        <option value="25">Entre 18 y 25 años</option>
                        <option value="30">Entre 25 y 30 años</option>
                        <option value="30+">30 años o más</option>
                    </select>
                    <label for="age">Sucursal:</label>
                    <select name="age">
                        <option value="">Todas</option>
                        <option value="18">18 años o menos</option>
                        <option value="25">Entre 18 y 25 años</option>
                        <option value="30">Entre 25 y 30 años</option>
                        <option value="30+">30 años o más</option>
                    </select>
                    <button type="submit">Filtrar</button>
                </form>
            </div>
            <a type="button" class="btn" href="{{ route('registroDocumento.create') }}" style="background: #2FA137; color:aliceblue">+ Agregar nuevo documento</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Codigo de Ruta</th>
                            <th>Fecha Recepcion</th>
                            <th>Fecha Entrega</th>
                            <th>Fecha Final</th>
                            <th>Tipo Documento</th>
                            <th>Unidad de Destino</th>
                            <th>Estado Documento</th>
                            <th>Sucursal</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="controlDeEstadoDocumentoParaMarcarlo">
                    @foreach($registroDocumento as $registroDocumentos)
                        <tr>
                            <td id="idRegistroEstadoDocumento">{{ $registroDocumentos->id }}</td>
                            <td>{{ $registroDocumentos->numero_hoja_ruta }}</td>
                            <td>{{ $registroDocumentos->fecha_recepcion}}</td>
                            <td>{{ $registroDocumentos->fecha_entrega}}</td>
                            <td>{{ $registroDocumentos->fecha_final}}</td>
                            <td>{{ $registroDocumentos->getTipoDocumento->referencia_documento}}</td>
                            <td>{{ $registroDocumentos->getUnidadDestino->unidad_area}}</td>
                            <td id="idEstadoDocumento">{{ $registroDocumentos->getEstadoDocumento->estado_documento}}</td>
                            <td></td>
                            {{-- <td>{{ $registroDocumentos->getUserRegister->getEmpleadoUser()->getSucursal()->id_sucursal}}</td> --}}
                            <td>{{ $registroDocumentos->observacion}}</td>
                            <td id="accionesDocumento">
                                <form action="{{ route('registroDocumento.destroy', $registroDocumentos) }}" method="post" id="{{ $registroDocumentos->id }}">
                                    @csrf @method('DELETE')
                                    <a class="btn me-3" href="{{ route('registroDocumento.edit', $registroDocumentos) }}" id="btnEditarDocumento" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fa fa-pencil-alt fa-xs" aria-hidden="true" style="color: black"></i>
                                    </a>
                                    <button class="btn" id="btnElimiarDocumento" data-toggle="tooltip" data-placement="top" title="Eliminar" data-descripcion="BorrarRegistroTablas">
                                        <i class="fa fa-trash fa-xs" aria-hidden="true" style="color: black"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
