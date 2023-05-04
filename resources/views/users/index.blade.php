@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2 class="titulo-datatable-pdf">Lista de Usuarios</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn" href="{{ route('users.create') }}" style="background: #2FA137; color:aliceblue">+ Crear nuevo usuario</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px" class="no-exportar-pdf">Action</th>
                            </tr>
                        </thead>
                        @php
                            $contadorRegistros=1;
                        @endphp
                        @foreach ($data as $key => $user)
                            <tr>
                                <td id="idRegistroEstadoDocumento">{{ $contadorRegistros }}</td>
                                @php
                                    $contadorRegistros++;
                                @endphp
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge text-white bg-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="no-exportar-pdf">
                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Ver</a>
                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline','id'=>$user->id]) !!}
                                    {{-- {!! Form::submit('Borrar', ['class' => 'btn btn-danger','data-descripcion' => 'BorrarRegistroTablas']) !!} --}}
                                    {{-- {!! Form::close() !!} --}}
                                    <form action="{{route('users.destroy',$user->id)}}" method="post" id="{{$user->id}}">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-md btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" data-descripcion="BorrarRegistroTablas">
                                            Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{-- {!! $data->render() !!} --}}
            </div>
        </div>
    </div>
@endsection
