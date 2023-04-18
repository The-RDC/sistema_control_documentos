@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Informacion de Empleados</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn" href="{{ route('empleado.create') }}" style="background: #2FA137; color:aliceblue">+ Agregar Empleado</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nro.</th>
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
                            <td><form action="{{ route('empleado.destroy', $empleados) }}" method="post" id="{{ $empleados->id }}">
                                    @csrf @method('DELETE')
                                    <a class="me-3" href="{{ route('empleado.show', $empleados) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn me-3" href="{{ route('empleado.edit', $empleados) }}" data-toggle="tooltip" data-placement="top" title="Editar">
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
