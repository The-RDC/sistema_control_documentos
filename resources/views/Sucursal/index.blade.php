@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 titulo-datatable-pdf">Información de Sucursales</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary" href="{{ route('sucursal.create') }}" style="background: #2FA137; color:aliceblue">+ Agregar nueva sucursal</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>empresa</th>
                            <th>regional</th>
                            <th>Sucursal</th>
                            <th>Dirección</th>
                            <th class="no-exportar-pdf">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $contadorRegistros=1;
                        @endphp
                        @foreach($sucursal as $sucursales)
                            <tr>
                                <td id="idRegistroEstadoDocumento">{{ $contadorRegistros }}</td>
                                @php
                                    $contadorRegistros++;
                                @endphp
                                <td>
                                    @foreach ($empresa as $empresas)
                                        @if ($empresas->id == $sucursales->id_empresa)
                                            {{$empresas->nombre_empresa}}    
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($regional as $regionales)
                                        @if ($regionales->id == $sucursales->id_regional)
                                            {{$regionales->nombre_regional}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $sucursales->nombre_sucursal }}</td>
                                <td>{{ $sucursales->direccion_sucursal }}</td>
                                <td class="no-exportar-pdf"><form action="{{ route('sucursal.destroy', $sucursales) }}" method="post" id="{{ $sucursales->id }}">
                                        @csrf @method('DELETE')
                                        <a class="btn me-3" href="{{ route('sucursal.edit', $sucursales) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fa fa-pencil-alt" aria-hidden="true" style="color:black"></i>
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
