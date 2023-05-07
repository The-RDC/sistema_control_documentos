@extends('dashboard-admin.admin')


@section('informacion')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="titulo-datatable-pdf">Información de los Roles</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn" href="{{ route('roles.create') }}" style="background: #2FA137; color:aliceblue"> + Crear nuevo rol</a>
                @endcan
            </div>
        </div>
    </div>
            </div>
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif


    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Nombre</th>
                <th class="no-exportar-pdf" width="280px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
            $contadorRegistros=1;
            @endphp
            @foreach ($roles as $key => $role)
                <tr>
                    <td id="idRegistroEstadoDocumento">{{ $contadorRegistros }}</td>
                    @php
                        $contadorRegistros++;
                    @endphp
                    <td>{{ $role->name }}</td>
                    <td class="no-exportar-pdf">
                        <a class="btn me-3" href="{{ route('roles.show',$role->id) }}" title="Ver">
                            <i class="fas fa-eye" style="color: #000000;"></i>
                        </a>
                        @can('role-edit')
                            <a class="btn me-3" href="{{ route('roles.edit',$role->id) }}" title="Editar">
                                <i class="fa fa-pencil-alt" aria-hidden="true" style="color:black"></i>
                            </a>
                        @endcan
                        @can('role-delete')
                            <!--{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}-->
                            <form action="{{route('roles.destroy',$role->id)}}" method="post" id="{{$role->id}}">
                                @csrf
                                @method('DELETE')
    {{--                            <button class="btn btn-md btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" data-descripcion="BorrarRegistroTablas">--}}
    {{--                                Borrar--}}
    {{--                            </button>--}}
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {!! $roles->render() !!}
</div>

</div>
    </div>
@endsection
