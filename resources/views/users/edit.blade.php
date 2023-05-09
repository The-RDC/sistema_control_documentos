@extends('dashboard-admin.admin')


@section('informacion')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Usuario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('users.index') }}" style="color:aliceblue"> Regresar</a>
            </div>
        </div>
    </div>
            </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hubo algunos problemas con su entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row" style="margin: 50px">
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Correo Electrónico:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contraseña:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Confirma Contraseña:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Rol:</strong>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    {{-- <div class="form-group">
                        <label for="">Sucursal: </label>
                        <select class="form-control" id="sucursales" style="border: solid 2px #EEE30B">
                            <option>--Seleccione la sucursal--</option>
                            @foreach($sucursal as $sucursales)
                                <option value="{{ $sucursales->id }}">
                                    {{ $sucursales->nombre_sucursal }} 
                                    <small class="text-break">({{$sucursales->direccion_sucursal}})</small>
                                </option>
                            @endforeach
                        </select>
                            <div class="sucursalesSeleccionadas">
                            <div class="container">
                                <div class="row" id="sucursalesSeleccionadas"></div>
                            </div>
                        </div>
                        <select class="form-control" name="ids_sucursal[]" id="sucursales2" multiple style="border: solid 2px #EEE30B" hidden>
                            <option>--Seleccione la sucursal--</option>
                            @foreach($sucursal as $sucursales)
                                <option value="{{ $sucursales->id }}">
                                    {{ $sucursales->nombre_sucursal }} 
                                    <small class="text-break">({{$sucursales->direccion_sucursal}})</small>
                                </option>
                            @endforeach
                        </select>           
                    </div> --}}
                    <div class="form-group">
                        <label for="">Sucursal: </label>
                        <select class="form-control" id="sucursales" style="border: solid 2px #EEE30B">
                            <option>--Seleccione la sucursal--</option>
                            @foreach($sucursal as $sucursales)
                                <option value="{{ $sucursales->id }}">
                                    {{ $sucursales->nombre_sucursal }} 
                                    <small class="text-break">({{$sucursales->direccion_sucursal}})</small>
                                </option>
                            @endforeach
                        </select>
                        <div class="sucursalesSeleccionadas">
                            <div class="container">
                                <div class="row" id="sucursalesSeleccionadas">
                                    @foreach($sucursal as $sucursales)
                                        @foreach ($acceso_usuario_sucursal as $acceso_usuario_sucursales)
                                            @if ($sucursales->id == $acceso_usuario_sucursales->id_sucursal and $acceso_usuario_sucursales->id_usuario == $user->id)
                                                <div class="tagSeleccionado">
                                                    <div class="cerrarTagSeleccionado" data-id-sucursal="{{$sucursales->id}}" id="cerrarTagSeleccionadoSucursal{{$sucursales->id}}">
                                                        X
                                                    </div>
                                                    <div class="texto">
                                                        {{ $sucursales->nombre_sucursal }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <select class="form-control" name="ids_sucursal[]" id="sucursales2" multiple style="border: solid 2px #EEE30B">
                            <option>--Seleccione la sucursal--</option>
                            @foreach($sucursal as $sucursales)
                                <option value="{{ $sucursales->id }}"
                                    @foreach ($acceso_usuario_sucursal as $acceso_usuario_sucursales)
                                        @if ($sucursales->id == $acceso_usuario_sucursales->id_sucursal and $acceso_usuario_sucursales->id_usuario == $user->id)
                                            selected
                                        @endif
                                    @endforeach
                                >
                                    {{ $sucursales->nombre_sucursal }} 
                                    <small class="text-break">({{$sucursales->direccion_sucursal}})</small>
                                </option>
                            @endforeach
                        </select>
                        @error('ids_sucursal')
                            <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                        @enderror
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
    </div>
@endsection
