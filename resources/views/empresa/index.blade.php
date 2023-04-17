@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Informacion de Empresa</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn" href="{{ route('empresa.create') }}" style="background: #2FA137; color:aliceblue">+Agregar nueva empresa</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Empresa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($empresa as $empresas)
                        <tr>
                            <td>{{ $empresas->id }}</td>
                            <td>{{ $empresas->nombre_empresa }}</td>
                            <td><form action="{{ route('empresa.destroy', $empresas) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a class="btn me-3" href="{{ route('empresa.edit', $empresas) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                         <i class="fas fa-pen-alt"></i>
                                    </a>
                                    <button class="btn btn-md" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
