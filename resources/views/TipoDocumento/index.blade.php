@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 titulo-datatable-pdf">nformación de Tipo de Documento</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary" href="{{ route('tipoDocumento.create') }}" style="background: #2FA137; color:aliceblue">+ Agregar nuevo tipo de documento</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Referencia Documento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $contadorRegistros=1;
                        @endphp
                        @foreach($tipoDocumento as $tipoDocumentos)
                            <tr>
                                <td id="idRegistroEstadoDocumento">{{ $contadorRegistros }}</td>
                                @php
                                    $contadorRegistros++;
                                @endphp
                                <td>{{ $tipoDocumentos->referencia_documento }}</td>
                                <td><form action="{{ route('tipoDocumento.destroy', $tipoDocumentos) }}" method="post" id="{{ $tipoDocumentos->id }}">
                                        @csrf @method('DELETE')
                                        <a class="btn me-3" href="{{ route('tipoDocumento.edit', $tipoDocumentos) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fa fa-pencil-alt" aria-hidden="true" style="color:black"></i>
                                        </a>
                                        <button class="btn btn-md" data-toggle="tooltip" data-placement="top" title="Eliminar" data-descripcion="BorrarRegistroTablas">
                                            <i class="fa fa-trash" aria-hidden="true" style="color:black"></i>
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
