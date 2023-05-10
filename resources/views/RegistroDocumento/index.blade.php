@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 titulo-datatable-pdf">Información de Documentos</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow ">
        <div class="card-header py-3">
            <div class="container">
                @if ($rol === "supervisor")
                <form method="GET" action="{{ route('registroDocumento.index') }}">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="name">Empresa:</label>
                            <select class="form-control" name="empresa" style="border: solid 2px #EEE30B">
                                <option value="">Empresa</option>
                                @foreach ($empresa as $empresas)
                                <option value="{{ $empresas->id }}">{{ $empresas->nombre_empresa }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="age">Regional:</label>
                            <select class="form-control" name="regional" style="border: solid 2px #EEE30B">
                                <option value="">Regional</option>
                                @foreach ($regional as $regionales)
                                <option value="{{ $regionales->id }}">{{ $regionales->nombre_regional }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="age">Sucursal:</label>
                            <select class="form-control" name="sucursal" style="border: solid 2px #EEE30B">
                                <option value="">sucursal</option>
                                @foreach ($sucursal as $sucursales)
                                <option value="{{ $sucursales->id }}">{{ $sucursales->nombre_sucursal }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="age">Procedencia Documento:</label>
                            <select class="form-control" name="procedencia" id="select1"
                                    style="border: solid 2px #EEE30B">
                                <option value="">Procedencia Documento</option>
                                @foreach($procedencia as $proced)
                                    <option value="{{ $proced->id }}">{{ $proced->procedencia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="age">Estado:</label>
                            <select class="form-control" name="estado" id="select2" style="border: solid 2px #EEE30B">
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <br>
                            <button type="submit" class="btn btn-success">Filtrar</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <a type="button" class="btn" href="{{ route('registroDocumento.create') }}"
                            style="background: #2FA137; color:aliceblue">+ Agregar nuevo documento
                        </a>
                    </div>
                    <!--div class="col-md">
                        <button class="btn btn-secondary">Ver todos los registros</button>
                    </div-->
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Código de Ruta</th>
                            <th>Fecha Recepción</th>
                            <th>Fecha Entrega</th>
                            <th>Fecha Final</th>
                            <th>Tipo Documento</th>
                            <th>Unidad de Destino</th>
                            <th>Estado Documento</th>
                            <th>Sucursal</th>
                            <th>Observaciones</th>
                            <th class="no-exportar-pdf">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="controlDeEstadoDocumentoParaMarcarlo">
                        @php
                            $contadorRegistros=1;
                        @endphp
                        @foreach ($data as $datos)
                        <tr>
                            <td id="idRegistroEstadoDocumento">{{ $contadorRegistros }}</td>
                             @php
                               $contadorRegistros++;
                             @endphp
                            <td>{{ $datos->numero_hoja_ruta }}</td>
                            <td>{{ $datos->fecha_recepcion }}</td>
                            <td>{{ $datos->fecha_entrega }}</td>
                            <td>{{ $datos->fecha_final }}</td>
                            <td>{{ $datos->getTipoDocumento->referencia_documento }}</td>
                            <td>
                                {{ $datos->getUnidadDestino->unidad_area ?? ''}}
                            </td>
                            <td id="idEstadoDocumento">
                                {{ $datos->getEstadoDocumento->estado_documento }}</td>
                            <td>
                                {{-- {{ $datos->getUserRegister->getEmpleado->getSucursal->nombre_sucursal }} --}}
                                @foreach ($sucursal as $sucursales)
                                    @if ($datos->id_sucursal == $sucursales->id)
                                        {{$sucursales->nombre_sucursal}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($observacion as $observaciones)
                                    @if ($datos->id == $observaciones->id_registro_documento)
                                        @foreach ($estado_documento as $estado_documentos)
                                            @if ($observaciones->id_estado_documento == $estado_documentos->id)
                                                Observacion {{$estado_documentos->estado_documento}}: {{$observaciones->observacion_documento}} <br><br>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td class="no-exportar-pdf" id="accionesDocumento">
                                <form action="{{ route('registroDocumento.destroy', $datos) }}" method="post"
                                    id="{{ $datos->id }}">
                                    @csrf @method('DELETE')
                                    @can('registroDocumento-edit')
                                    <a class="btn me-3" href="{{ route('registroDocumento.edit', $datos) }}"
                                        id="btnEditarDocumento" data-toggle="tooltip" data-placement="top"
                                        title="Editar">
                                        <i class="fa fa-pencil-alt fa-xs" aria-hidden="true" style="color: black"></i>
                                    </a>
                                    @endcan
                                    @can('registroDocumento-delete')
                                    <button class="btn" id="btnElimiarDocumento" data-toggle="tooltip"
                                        data-placement="top" title="Eliminar" data-descripcion="BorrarRegistroTablas">
                                        <i class="fa fa-trash fa-xs" aria-hidden="true" style="color: black"></i>
                                    </button>
                                    @endcan

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
