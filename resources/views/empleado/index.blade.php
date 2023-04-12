@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Empleados</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informacion de los Empleados</h6>
            <a type="button" class="btn btn-primary" href="{{ route('empleado.create') }}">agregar</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Nacionalidad</th>
                            <th># Documento</th>
                            <th>Tipo Documento</th>
                            <th>Correo Institucional</th>
                            <th># Celular</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($empleado as $empleados)
                        <tr>
                            <td>{{ $empleados->id }}</td>
                            <td>{{ $empleados->nombre_cargo }}</td>
                            <td><form action="{{ route('empleado.destroy', $empleados) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a class="me-3" href="{{ route('empleado.edit', $empleados) }}">
                                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <button class="btn btn-md btn-light ">
                                        <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
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
