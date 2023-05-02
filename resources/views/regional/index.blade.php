@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 titulo-datatable-pdf">Información de Regionales</h1>
        <br>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a type="button" class="btn btn-primary" href="{{ route('regional.create') }}" style="background: #2FA137; color:aliceblue">+ Agregar nueva regional</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Empresa</th>
                            <th>Regional</th>
                            <th class="no-exportar-pdf">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $contadorRegistros=1; @endphp
                            @foreach($regional as $regionales)
                                <tr>
                                    <td>{{ $contadorRegistros }}</td>
                                    @php
                                        $contadorRegistros++;
                                    @endphp
                                    <td>
                                        @foreach ($empresa as $empresas)
                                            @if ($empresas->id_regional == $regionales->id)
                                                {{$empresas->nombre_empresa}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $regionales->nombre_regional }}</td>
                                    <td class="no-exportar-pdf"><form action="{{ route('regional.destroy', $regionales) }}" method="post" id="{{ $regionales->id }}">
                                            @csrf @method('DELETE')
                                            <a class="btn me-3" href="{{ route('regional.edit', $regionales) }}" data-toggle="tooltip" data-placement="top" title="Editar">
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
