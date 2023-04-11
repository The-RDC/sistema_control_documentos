@extends('dashboard-admin.admin')
@section('informacion')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a type="button" class="btn btn-primary" href="{{ route('cargo.create') }}">agregar</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($cargo as $cargos)
                        <tr>
                            <td>{{ $cargos->id }}</td>
                            <td>{{ $cargos->nombre_cargo }}</td>
                            <td><form action="{{ route('cargo.destroy', $cargos) }}" method="post">
                                    @csrf @method('DELETE')
                                    <a class="me-3" href="{{ route('cargo.edit', $cargos) }}">
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
