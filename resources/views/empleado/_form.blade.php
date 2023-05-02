<div class="row pl-4">
    <div class="col-lg-8">
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="">Nombre Empleado</label>
                <input type="text" class="form-control " name="nombres" value="{{ old('nombres', $empleado->nombres) }}" placeholder="" style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Ap. Paterno</label>
                <input type="text" class="form-control " value="{{ old('ap_paterno', $empleado->ap_paterno) }}" name="ap_paterno"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Ap. Materno</label>
                <input type="text" class="form-control " value="{{ old('ap_materno', $empleado->ap_materno) }}" name="ap_materno"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="">Nacionalidad</label>
                <input type="text" class="form-control " value="{{ old('nacionalidad', $empleado->nacionalidad) }}" name="nacionalidad"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Nro. Documento</label>
                <input type="text" class="form-control " name="nro_documento" value="{{ old('nro_documento', $empleado->nro_documento) }}"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Tipo Documento</label>
                <select class="form-control" name="tipo_documento" style="border: solid 2px #EEE30B">
                        <option value="CI" @php echo $empleado->tipo_documento == "CI" ? "selected" : ""; @endphp>CI</option>
                        <option value="Pasaporte" @php echo $empleado->tipo_documento == "Pasaporte" ? "selected" : ""; @endphp>Pasaporte</option>
                        <option value="Visa laboral" @php echo $empleado->tipo_documento == "Visa laboral" ? "selected" : ""; @endphp >Visa laboral</option>
                        <option value="Cédula de Identidad de Extranjero" @php echo $empleado->tipo_documento == "Cédula de Identidad de Extranjero" ? "selected" : ""; @endphp >Cédula de Identidad de Extranjero</option>
                </select>
                <!--label for="">Tipo de Documento</label>
                <input type="text" class="form-control " name="tipo_documento" value="{{ old('tipo_documento', $empleado->tipo_documento) }}"
                       placeholder="" style="border: solid 2px #EEE30B"-->
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="">Visa</label>
                <input type="text" class="form-control " name="ext_visa_laboral" value="{{ old('ext_visa_laboral', $empleado->ext_visa_laboral) }}"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Correo Electrónico</label>
                <input type="text" class="form-control " name="email_personal" value="{{ old('email_personal', $empleado->email_personal) }}"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Correo Corporativo</label>
                <input type="text" class="form-control " name="email_institucional" value="{{ old('email_institucional', $empleado->email_institucional) }}"
                       placeholder=" " style="border: solid 2px #EEE30B">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="">Fec. Nacimiento</label>
                <input type="date" class="form-control " name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento) }}"
                       placeholder=" " style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Género</label>
                <select class="form-control" name="id_genero" style="border: solid 2px #EEE30B">
                    @foreach($genero as $generos)
                        <option value="{{ $generos->id }}"
                                @if($generos->id == $empleado->id_genero)
                                selected
                            @endif
                        >{{ $generos->nombre_genero }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label for="">Estado Civil</label>
                <select class="form-control" name="id_estadocivil" style="border: solid 2px #EEE30B">
                    @foreach($estaCivil as $estaCivils)
                        <option value="{{ $estaCivils->id }}"
                                @if($estaCivils->id == $empleado->id_estadocivil)
                                selected
                            @endif
                        >{{ $estaCivils->estadocivil }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="">Celular</label>
                <input type="text" class="form-control " name="telf_celular" value="{{ old('telf_celular', $empleado->telf_celular) }}"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Teléfono Fijo</label>
                <input type="text" class="form-control " name="telf_fijo" value="{{ old('telf_fijo', $empleado->telf_fijo) }}"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
            <div class="col-sm-4">
                <label for="">Dirección</label>
                <input type="text" class="form-control " name="direccion" value="{{ old('direccion', $empleado->direccion) }}"
                       placeholder="" style="border: solid 2px #EEE30B">
            </div>
        </div>

        <div class="form-group row">
{{--            <div class="col-sm-3">--}}
{{--                <label for="">Regional</label>--}}
{{--                <select class="form-control" name="id_regional" style="border: solid 2px #EEE30B">--}}
{{--                    <option selected>Regional</option>--}}
{{--                    @foreach($regional as $regionales)--}}
{{--                        <option value="{{ $regionales->id }}"--}}
{{--                                @if($regionales->id == $empleado->id_regional)--}}
{{--                                selected--}}
{{--                            @endif--}}
{{--                        >{{ $regionales->nombre_regional }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--    --}}
{{--            <div class="col-sm-3">--}}
{{--                <label for="">Sucursal</label>--}}
{{--                <select class="form-control" name="id_sucursal" style="border: solid 2px #EEE30B">--}}
{{--                    <option selected>Sucursal</option>--}}
{{--                    @foreach($sucursal as $sucursales)--}}
{{--                        <option value="{{ $sucursales->id }}"--}}
{{--                                @if($sucursales->id == $empleado->id_sucursal)--}}
{{--                                selected--}}
{{--                            @endif--}}
{{--                        >{{ $sucursales->nombre_sucursal }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            --}}
            <div class="col-sm-3">
                <label for="">Cargo</label>
                <select class="form-control" name="id_cargo" style="border: solid 2px #EEE30B">
                    <!--option selected>Cargo</option-->
                    @foreach($cargo as $cargos)
                        <option value="{{ $cargos->id }}"
                                @if($cargos->id == $empleado->id_cargo)
                                selected
                            @endif
                        >{{ $cargos->nombre_cargo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Seleccione la Empresa y Sucursal del Empleado</h1>
        </div>
        <div class="accordion" id="accordionEmpresa">
            @php
              $i=1;
            @endphp           
            @foreach ($empresa  as $empresas)
                <div class="card" style="border: solid .5px #EEE30B">
                    <div class="card-header" style="border: solid 1px #EEE30B" id="headingOne{{$i}}">
                        <h2 class="mb-0">
                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="false" aria-controls="collapseOne">
                            <small class="text-muted" style="font-size: 15px;">Regional: 
                                @foreach ($regional as $regionales)
                                    @if ($regionales->id == $empresas->id_regional)
                                        {{$regionales->nombre_regional}}
                                    @endif
                                @endforeach
                            </small>
                            <br>
                            <small style="font-size: 15px;">Empresa: {{$empresas->nombre_empresa}}</small> 
                        </button>
                        </h2>
                    </div>
        
                    <div id="collapseOne{{$i}}" class="collapse false" aria-labelledby="headingOne{{$i}}" data-parent="#accordionEmpresa">
                        <div class="card-body">
                            @foreach ($empSuc as $empSucs)
                                @if ($empresas->id == $empSucs->id_empresa)
                                    @foreach ($sucursal as $sucursales)
                                        @if ($sucursales->id == $empSucs->id_sucursal)
                                            <input type="checkbox" name="sucursales[]" id="" value='{"id_sucursal":{{$empSucs->id_sucursal}},"id_empresa":{{$empSucs->id_empresa}}}'
                                                @foreach ($empleadoSucursal as $empleadoSucursales)
                                                    @if ($empleadoSucursales->id_sucursal == $sucursales->id)
                                                        @foreach ($empleado as $empelados) 
                                                            @if ($empleadoSucursales->id_empleado == $empleado->id and !is_null($empleado->id))
                                                              checked
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            ><label for="">&nbsp;&nbsp;&nbsp;{{$sucursales->nombre_sucursal}}</label><br>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @php
                  $i++;
                @endphp
            @endforeach
        </div>
    </div>
</div>

<hr>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
    <a href="{{ route('empleado.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
