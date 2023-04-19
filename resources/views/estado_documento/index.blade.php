@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 titulo-datatable-pdf">Informacion de Estado Documento</h1>
        <br>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a type="button" class="btn btn-primary" href="{{ route('estadoDocumento.create') }}" style="background: #2FA137; color:aliceblue">+ Agregar nuevo estado del Documento</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Estados del Documento</th>
                            <th class="no-exportar-pdf">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estadoDocumento as $estadoDs)
                            <tr>
                                <td>{{ $estadoDs->id }}</td>
                                <td>{{ $estadoDs->estado_documento }}</td>
                                <td class="no-exportar-pdf"><form action="{{ route('estadoDocumento.destroy', $estadoDs) }}" method="post" id="{{ $estadoDs->id }}">
                                        @csrf @method('DELETE')
                                        <a class="btn me-3" href="{{ route('estadoDocumento.edit', $estadoDs) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                             <i class="fas fa-pen-alt"></i>
                                        </a>
                                        <button class="btn btn-md" data-toggle="tooltip" data-placement="top" title="Eliminar" data-descripcion="BorrarRegistroTablas">
                                            <i class="fas fa-trash-alt"></i>
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
