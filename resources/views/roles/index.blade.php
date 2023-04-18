@extends('dashboard-admin.admin')


@section('informacion')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Informacion de los Roles</h2>
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


    <table class="table table-bordered">
        <tr>
            <th>Nro</th>
            <th>Nombre</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Ver</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>


    {!! $roles->render() !!}
</div>

</div>
    </div>
@endsection
