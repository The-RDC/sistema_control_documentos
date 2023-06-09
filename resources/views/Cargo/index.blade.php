@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 titulo-datatable-pdf">Información de Cargos</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn" href="{{ route('cargo.create') }}" style="background: #2FA137; color:aliceblue">+ Agregar Cargo</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Cargo</th>
                            <th class="no-exportar-pdf">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $contadorRegistros=1;
                    @endphp
                    @foreach($cargo as $cargos)
                        <tr>
                            <td>{{ $contadorRegistros }}</td>
                            @php
                                $contadorRegistros++;
                            @endphp
                            <td>{{ $cargos->nombre_cargo }}</td>
                            <td class="no-exportar-pdf"><form action="{{ route('cargo.destroy', $cargos) }}" method="post" id="{{$cargos->id}}">
                                    @csrf @method('DELETE')
                                    <a class="btn me-3" href="{{ route('cargo.edit', $cargos) }}" data-toggle="tooltip" data-placement="top" title="Editar">
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