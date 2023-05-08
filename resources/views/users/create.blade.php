@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Crear nuevo Usuario</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('users.index') }}" > Regresar</a>
                        </div>
                    </div>
                </div>

                {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ups!</strong> Hubo algunos problemas con su entrada.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                    <div class="row" style="padding: 50px;">
                        <div class="col-md-9">
                            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md">
                                        <div class="form-group">
                                            <strong>Nombre:</strong>
                                            {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control', 'style'=>'border: solid 2px #EEE30B')) !!}
                                        </div>
                                        @error('name')
                                            <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                        @enderror
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md">
                                        <div class="form-group">
                                            <strong>Correo Electrónico:</strong>
                                            {!! Form::text('email', null, array('placeholder' => 'Correo Electrónico','class' => 'form-control', 'style'=>'border: solid 2px #EEE30B')) !!}
                                        </div>
                                        @error('email')
                                            <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md">
                                        <div class="form-group">
                                            <label for="">Rol: </label>
                                            <select class="form-control" name="ids_rol[]" style="border: solid 2px #EEE30B" >
                                                @foreach($roles as $roless)
                                                    <option value="{{ $roless->id }}">
                                                        {{ $roless->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('ids_rol')
                                                <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                            @enderror

                                            {{-- <strong>Rol:</strong>
                                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control', 'style'=>'border: solid 2px #EEE30B','multiple')) !!} --}}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md">
                                        
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
                                            @error('ids_sucursal')
                                                <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                            @enderror
                                        </div>    
                                    </div>
                                </div>

                                <br>
                                
                                <div class="contrasenia" style="border: 1px solid red;">
                                    <div class="row" style="margin-left: 30px;">
                                        <div class="recomendaciones-contrasenia text-rigth">
                                            Recomendaciones para crear una nueva contraseña robusta: <br><br>
                                            a. Longitud de contraseña: como mínimo 8 caracteres <br>
                                            b. Caracteres numéricos: como mínimo 2 números <br>
                                            c. Caracteres de símbolos: como mínimo 1 carácter especial <br>
                                            d. Letras mayúsculas: como mínimo 1 letra mayúscula <br>
                                            e. Letras minúsculas: como mínimo 1 letra minúscula <br> 
                                        </div>
                                    </div>
                                    <div class="inputs-contrasenias" style="margin: 50px;">
                                        <div class="row">
                                            <!--div class="col-xs-12 col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="empleado_id">Empleado:</label>
                                                    <select name="empleado_id" class="form-control" id="empleado_id" style="border: solid 2px #EEE30B">
                                                        <option> Seleccione un empleado</option>
                                                        @foreach ($empleados as $empleado)
                                                            <option value="{{ $empleado->id }}">{{ $empleado->nombres }} {{ $empleado->ap_paterno }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div-->
                                            <div class="col-xs-12 col-sm-12 col-md-8">
                                                <div class="form-group">
                                                    <strong>Contraseña:</strong>
                                                    {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control', 'style'=>'border: solid 2px #EEE30B')) !!}
                                                    @error('password')
                                                        <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-8">
                                                <div class="form-group">
                                                    <strong>Confirma Contraseña:</strong>
                                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Contraseña','class' => 'form-control', 'style'=>'border: solid 2px #EEE30B')) !!}
                                                    @error('confirm-password')
                                                        <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn" style="background: #2FA137; color:aliceblue">Guardar</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
