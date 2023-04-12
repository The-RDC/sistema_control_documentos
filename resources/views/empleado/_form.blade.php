<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <input type="text" class="form-control " name="nombres" value="{{ old('nombres', $empleado->nombres) }}" placeholder="Nombre">
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control " value="{{ old('ap_paterno', $empleado->ap_paterno) }}" name="ap_paterno"
               placeholder="Apellido paterno">
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control " value="{{ old('ap_materno', $empleado->ap_materno) }}" name="ap_materno"
               placeholder="Apellido Materno">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <input type="text" class="form-control " value="{{ old('nacionalidad', $empleado->nacionalidad) }}" name="nacionalidad"
               placeholder="Nacionalidad">
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control " name="nro_documento" value="{{ old('nro_documento', $empleado->nro_documento) }}"
               placeholder="Numero Documento">
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control " name="tipo_documento" value="{{ old('tipo_documento', $empleado->tipo_documento) }}"
               placeholder="Tipo Documento">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <input type="text" class="form-control " name="ext_visa_laboral" value="{{ old('ext_visa_laboral', $empleado->ext_visa_laboral) }}"
               placeholder="Visa">
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control " name="email_personal" value="{{ old('email_personal', $empleado->email_personal) }}"
               placeholder="Correo Personal">
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control " name="email_institucional" value="{{ old('email_institucional', $empleado->email_institucional) }}"
               placeholder="Correo Corporativo">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <input type="date" class="form-control " name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento) }}"
               placeholder="Fecha Nacimiento">
    </div>
    <div class="col-sm-4">
        <select class="form-control" name="genero">
            <option selected>Genero</option>
            <option value="1">Femenino</option>
            <option value="2">Masculino</option>
            <option value="3">Otros</option>
        </select>
    </div>
    <div class="col-sm-4">
        <select class="form-control" name="estado_civil">
            <option selected>Estado Civil</option>
            <option value="1">Soltero</option>
            <option value="2">Divorciado</option>
            <option value="3">Casado</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <input type="text" class="form-control " name="telf_celular" value="{{ old('telf_celular', $empleado->telf_celular) }}"
               placeholder="# Celular">
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control " name="telf_fijo" value="{{ old('telf_fijo', $empleado->telf_fijo) }}"
               placeholder="Telefono Fijo">
    </div>
    <div class="col-sm-4">
        <input type="text" class="form-control " name="direccion" value="{{ old('direccion', $empleado->direccion) }}"
               placeholder="Direccion">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-3">
        <select class="form-control" name="id_regional">
            <option selected>Regional</option>
            @foreach($regional as $regionales)
                <option value="{{ $regionales->id }}"
                        @if($regionales->id == $empleado->id_regional)
                        selected
                    @endif
                >{{ $regionales->nombre_regional }}"</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-3">
        <select class="form-control" name="id_sucursal">
            <option selected>Sucursal</option>
            @foreach($sucursal as $sucursales)
                <option value="{{ $sucursales->id }}"
                        @if($sucursales->id == $empleado->id_sucursal)
                        selected
                    @endif
                >{{ $sucursales->nombre_sucursal }}"</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-3">
        <select class="form-control" name="id_empresa">
            <option selected>Empresa</option>
            @foreach($empresa as $empresas)
                <option value="{{ $empresas->id }}"
                        @if($empresas->id == $empleado->id_empresa)
                        selected
                    @endif
                >{{ $empresas->nombre_empresa }}"</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-3">
        <select class="form-control" name="id_cargo">
            <option selected>Cargo</option>
            @foreach($cargo as $cargos)
                <option value="{{ $cargos->id }}"
                        @if($cargos->id == $empleado->id_cargo)
                        selected
                    @endif
                >{{ $cargos->nombre_cargo }}"</option>
            @endforeach
        </select>
    </div>
</div>
<hr>

<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit">Guardar</button>
    <a href="{{ route('empleado.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
