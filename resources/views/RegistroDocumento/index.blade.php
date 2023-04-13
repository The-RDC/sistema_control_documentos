@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Informacion de Documentos</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

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
                    <tfoot>
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
                    </tfoot>
                    <tbody id="controlDeEstadoDocumentoParaMarcarlo">
                    @foreach($registroDocumento as $registroDocumentos)
                        <tr>
                            <td>{{ $registroDocumentos->id }}</td>
                            <td>{{ $registroDocumentos->numero_hoja_ruta }}</td>
                            <td>{{ $registroDocumentos->fecha_recepcion}}</td>
                            <td>{{ $registroDocumentos->fecha_entrega}}</td>
                            <td>{{ $registroDocumentos->fecha_final}}</td>
                            <td>{{ $registroDocumentos->getTipoDocumento->referencia_documento}} </td>
                            <td>{{ $registroDocumentos->id_unidad_destino}}</td>
                            <td id="idEstadoDocumento">{{ $registroDocumentos->id_estado_documento}}</td>
                            <td>{{ $registroDocumentos->observacion}}</td>
                            <td id="accionesDocumento">
                                <form action="{{ route('registroDocumento.destroy', $registroDocumentos) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a class="me-3" href="{{ route('registroDocumento.edit', $registroDocumentos) }}" id="btnEditarDocumento">
                                        <i class="fa fa-pencil-alt fa-xs" aria-hidden="true" style="color: #2ecc71"></i>
                                    </a>
                                    <button class="btn btn-md btn-light" id="btnEstadoFinalizar">
                                        <i class="fas fa-check fa-xs" style="color: #f39c12;"></i>
                                    </button>
                                    <button class="btn btn-md btn-light" id="btnElimiarDocumento">
                                        <i class="fa fa-trash fa-xs" aria-hidden="true" style="color: #c0392b"></i>
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
