@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Informacion de Tipo de Documento</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tipos de Documento</h6>
            <a type="button" class="btn btn-primary" href="{{ route('tipoDocumento.create') }}">Agregar</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Referencia Documento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Referencia Documento</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($tipoDocumento as $tipoDocumentos)
                        <tr>
                            <td>{{ $tipoDocumentos->id }}</td>
                            <td>{{ $tipoDocumentos->referencia_documento }}</td>
                            <td><form action="{{ route('tipoDocumento.destroy', $tipoDocumentos) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a class="me-3" href="{{ route('tipoDocumento.edit', $tipoDocumentos) }}">
                                        <i class="fa fa-pencil-alt" aria-hidden="true" style="color:green">Editar</i>
                                    </a>
                                    <button class="btn btn-md btn-light ">
                                        <i class="fa fa-trash" aria-hidden="true" style="color:red"> Eliminar</i>
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
