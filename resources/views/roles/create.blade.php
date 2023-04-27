@extends('dashboard-admin.admin')


@section('informacion')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Crear nuevo rol</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn" href="{{ route('roles.index') }}" style="background: #2FA137; color:aliceblue">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body" style="margin: 50px;">
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


            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Nombre del nuevo rol:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Nombre del nuevo rol','class' => 'form-control','style'=>'border: solid 2px #EEE30B')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col"><strong>Permisos a asignar:</strong></div>
                                <div class="col text-right" style="font-size: 18px; color:#594AF7">
                                    <input type="checkbox" id="seleccionar-todos-roles"> <label for="seleccionar-todos-roles">Seleccionar Todo</label>
                                </div>
                            </div>
                            <br/><br>
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
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->name }}
                                            </label>
                                            <br/>
                                        @endif
                                        @php
                                            $contadorPermisos++;
                                        @endphp
                                    @endforeach
                            </div>
{{--                            <!--@foreach($permission as $value)--}}
{{--                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}--}}
{{--                                    {{ $value->name }}--}}
{{--                                </label>--}}
{{--                                <br/>--}}
{{--                            @endforeach-->--}}
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn" style="background: #2FA137; color:aliceblue">Guardar</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
