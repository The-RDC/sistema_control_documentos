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
                            <th>Correo Institucional</th>
                            <th># Celula</th>
                            <th>direccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($empleado as $empleados)
                        <tr>
                            <td>{{ $empleados->id }}</td>
                            <td>{{ $empleados->nombres }}</td>
                            <td>{{ $empleados->nacionalidad }}</td>
                            <td>{{ $empleados->email_institucional }}</td>
                            <td>{{ $empleados->telf_celular }}</td>
                            <td>{{ $empleados->direccion }}</td>
                            <td><form action="{{ route('empleado.destroy', $empleados) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a class="me-3" href="{{ route('empleado.show', $empleados) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="me-3" href="{{ route('empleado.edit', $empleados) }}">
                                       <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <button class="btn btn-md btn-light ">
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
