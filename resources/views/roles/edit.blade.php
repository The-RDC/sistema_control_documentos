@extends('dashboard-admin.admin')


@section('informacion')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Editar Rol</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn" href="{{ route('roles.index') }}" style="background: #2FA137; color:aliceblue"> Regresar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permisos:</strong>
                            <br/>
                            <div class="row">
                                <div class="col">
                                    @php
                                        $contadorPermisos=1;
                                    @endphp
                                    @foreach($permission as $value)
                                        @if($contadorPermisos%15==0)
                                            </div>
                                            <div class="col">
                                        @else
                                            <label>
                                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                {{ $value->name }}
                                            </label>
                                            <br/>
                                        @endif
                                        @php
                                            $contadorPermisos++;
                                        @endphp   
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn" style="background: #2FA137; color:aliceblue">Guardar</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>

        </div>
    </div>

@endsection
