@extends('dashboard-admin.admin')


@section('informacion')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Ver Roles</h2>
            </div>
            <div class="pull-right">
                <a class="btn" href="{{ route('roles.index') }}" style="background: #2FA137; color:aliceblue"> Regresar</a>
            </div>
        </div>
    </div>
            </div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Permisos:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
@endsection
