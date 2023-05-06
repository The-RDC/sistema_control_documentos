@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['actualizarPerfil', $user->id]]) !!}
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Informacion del Usuario</h1>
                            </div>

                            {{-- <table class="table caption-top">
                                <thead>
                                <tr>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">Nombres</th>
                                    <td>{{ $empleado->nombres }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido Paterno</th>
                                    <td>{{ $empleado->ap_paterno }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido Materno</th>
                                    <td>{{ $empleado->ap_materno }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nacionalidad</th>
                                    <td>{{ $empleado->nacionalidad }}</td>
                                </tr>
                                <tr>
                                    <th scope="row"># Documento</th>
                                    <td>{{ $empleado->nro_documento }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tipo Documento</th>
                                    <td>{{ $empleado->tipo_documento }}</td>
                                </tr>
                                </tbody>
                            </table> --}}
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
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
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple', 'hidden')) !!}
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        <br>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
