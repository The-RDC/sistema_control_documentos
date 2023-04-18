@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Informacion de Documentos</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow ">
        <div class="card-header py-3">
            <div class="container">
                <form method="GET" action="{{ route('registroDocumento.index') }}">
                    <div class="form-group row">

                        <div class="col-sm-3">
                            <label for="name">Empresa:</label>
                            <select class="form-control" name="empresa" style="border: solid 2px #EEE30B">
                                <option value="">Empresa</option>
                                @foreach ($empresa as $empresas)
                                <option value="{{ $empresas->nombre_empresa }}">{{ $empresas->nombre_empresa }}"
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="age">Regional:</label>
                            <select class="form-control" name="regional" style="border: solid 2px #EEE30B">
                                <option value="">Regional</option>
                                @foreach ($regional as $regionales)
                                <option value="{{ $regionales->nombre_regional }}">{{ $regionales->nombre_regional }}"
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="age">Sucursal:</label>
                            <select class="form-control" name="sucursal" style="border: solid 2px #EEE30B">
                                <option value="">sucursal</option>
                                @foreach ($sucursal as $sucursales)
                                <option value="{{ $sucursales->nombre_sucursal }}">{{ $sucursales->nombre_sucursal }}"
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3" >
                            <div class="form-control" >
                           <br>
                            <button type="submit" class="btn btn-success">Filtrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <a type="button" class="btn" href="{{ route('registroDocumento.create') }}"
                style="background: #2FA137; color:aliceblue">+ Agregar nuevo documento</a>
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
                        @foreach ($data as $datos)
                        <tr>
                            <td id="idRegistroEstadoDocumento">{{ $datos->id }}</td>
                            <td>{{ $datos->numero_hoja_ruta }}</td>
                            <td>{{ $datos->fecha_recepcion }}</td>
                            <td>{{ $datos->fecha_entrega }}</td>
                            <td>{{ $datos->fecha_final }}</td>
                            <td>{{ $datos->getTipoDocumento->referencia_documento }}</td>
                            <td>{{ $datos->getUnidadDestino->unidad_area }}</td>
                            <td id="idEstadoDocumento">
                                {{ $datos->getEstadoDocumento->estado_documento }}</td>
                            <td>{{ $datos->getUserRegister->getEmpleado->getSucursal->nombre_sucursal }}
                            </td>
                            <td>{{ $datos->observacion }}</td>
                            <td id="accionesDocumento">
                                <form action="{{ route('registroDocumento.destroy', $datos) }}" method="post"
                                    id="{{ $datos->id }}">
                                    @csrf @method('DELETE')
                                    <a class="btn me-3" href="{{ route('registroDocumento.edit', $datos) }}"
                                        id="btnEditarDocumento" data-toggle="tooltip" data-placement="top"
                                        title="Editar">
                                        <i class="fa fa-pencil-alt fa-xs" aria-hidden="true" style="color: black"></i>
                                    </a>
                                    <button class="btn" id="btnElimiarDocumento" data-toggle="tooltip"
                                        data-placement="top" title="Eliminar" data-descripcion="BorrarRegistroTablas">
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
