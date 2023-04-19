@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 titulo-datatable-pdf">Informacion de Unidades</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn" href="{{ route('unidad.create') }}" style="background: #2FA137; color:aliceblue">+ Agregar nueva unidad</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Unidad</th>
                            <th class="no-exportar-pdf">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($unidad as $unidades_data)
                        <tr>
                            <td>{{ $unidades_data->id }}</td>
                            <td>{{ $unidades_data->unidad_area }}</td>
                            <td class="no-exportar-pdf"><form action="{{ route('unidad.destroy', $unidades_data) }}" method="post" id="{{ $unidades_data->id }}">
                                    @csrf @method('DELETE')
                                    <a class="btn me-3" href="{{ route('unidad.edit', $unidades_data) }}">
                                        <i class="fa fa-pencil-alt" aria-hidden="true" style="color:black" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                                    </a>
                                    <button class="btn btn-md" data-descripcion="BorrarRegistroTablas">
                                        <i class="fa fa-trash" aria-hidden="true" style="color:black" data-toggle="tooltip" data-placement="top" title="Eliminar"></i>
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
