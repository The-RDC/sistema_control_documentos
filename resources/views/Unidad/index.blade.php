@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Informacion de Unidades</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Unidades</h6>
            <a type="button" class="btn btn-primary" href="{{ route('unidad.create') }}">Agregar</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Unidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Unidad</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($unidades as $unidades_data)
                        <tr>
                            <td>{{ $unidades_data->id }}</td>
                            <td>{{ $unidades_data->unidad_area }}</td>
                            <td><form action="{{ route('unidad.destroy', $unidades_data) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a class="me-3" href="{{ route('unidad.edit', $unidades_data) }}">
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
