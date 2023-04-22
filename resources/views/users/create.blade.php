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
                            <a class="btn" href="{{ route('users.index') }}" style="background: #2FA137; color:aliceblue"> Regresar</a>
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

                    <div class="row" style="padding: 50px;">
                        <div class="col-md-7">
                            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Nombre:</strong>
                                            {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control', 'style'=>'border: solid 2px #EEE30B')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Correo Electrónico:</strong>
                                            {!! Form::text('email', null, array('placeholder' => 'Correo Electrónico','class' => 'form-control', 'style'=>'border: solid 2px #EEE30B')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="empleado_id">Empleado:</label>
                                            <select name="empleado_id" class="form-control" id="empleado_id" style="border: solid 2px #EEE30B">
                                                <option> Seleccione un empleado</option>
                                                @foreach ($empleados as $empleado)
                                                    <option value="{{ $empleado->id }}">{{ $empleado->nombres }} {{ $empleado->ap_paterno }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Contraseña:</strong>
                                            {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control', 'style'=>'border: solid 2px #EEE30B')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Confirma Contraseña:</strong>
                                            {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Contraseña','class' => 'form-control', 'style'=>'border: solid 2px #EEE30B')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Rol:</strong>
                                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control', 'style'=>'border: solid 2px #EEE30B','multiple')) !!}
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
    </div>

@endsection
