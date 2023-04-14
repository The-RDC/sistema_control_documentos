@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Informacion de Documentos</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registro Documentos</h6>
            <a type="button" class="btn btn-primary" href="{{ route('registroDocumento.create') }}">Agregar</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Num. Hoja Ruta</th>
                            <th>Fecha Recepcion</th>
                            <th>Fecha Entrega</th>
                            <th>Ficha Final</th>
                            <th>Tipo Documento</th>
                            <th>Unidad de Destino</th>
                            <th>Estado Documento</th>
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
                            <td>{{ $registroDocumentos->observacion}}</td>
                            <td id="accionesDocumento">
                                <form action="{{ route('registroDocumento.destroy', $registroDocumentos) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a class="btn me-3" href="{{ route('registroDocumento.edit', $registroDocumentos) }}" id="btnEditarDocumento" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fa fa-pencil-alt fa-xs" aria-hidden="true" style="color: black"></i>
                                    </a>
                                    <button class="btn" id="btnElimiarDocumento" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
