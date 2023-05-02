
{{-- <div class="form-group">
    <div class="col-sm-12">
        <label for="">Regional</label>
        <select class="form-control" name="id_regional" style="border: solid 2px #EEE30B">
            @foreach($regional as $regionals)
                <option value="{{ $regionals->id }}"
                        @if($regionals->id == $regionals->id_regional)
                        selected
                    @endif
                >{{ $regionals->nombre_regional }}</option>
            @endforeach
        </select>
    </div>
</div> --}}

<div class="form-group">
    <div class="col-sm-12">
        <label for="">Nombre de Empresa</label> 
        <input type="text" class="form-control" name="nombre_empresa" value="{{ old('nombre_empresa', $empresa->nombre_empresa) }}" placeholder="Introduzca la empresa"style="border: solid 2px #EEE30B">
    </div>
</div>

{{-- <div class="form-group">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 text-left p-2">
                Sucursales disponibles:
            </div>  
        </div>
        <div class="row">
            <div class="col">
                @php
                    $contadorPermisos=1;
                @endphp
                @foreach($sucursales as $value)
                    @if($contadorPermisos%6==0)
            </div>
            <div class="col">
                @else
                        <label>
                            <input type="checkbox" name="sucursales[]" value="{{ $value->id }}"
                                   @if(in_array($value->id, $sucurid))
                                   checked
                                   @endif
                                   >
                            {{ $value->nombre_sucursal }}
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
</div> --}}
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
    <a href="{{ route('empresa.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
