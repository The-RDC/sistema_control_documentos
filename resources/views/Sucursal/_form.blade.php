<div class="form-group">
  <div class="col-sm-12">
      <label for="">Empresa: </label>
      <select class="form-control" name="id_empresa" style="border: solid 2px #EEE30B">
        @foreach($empresa as $empresas)
              <option value="{{ $empresas->id }}"
                  @if($empresas->id == $sucursal->id_empresa)
                      selected
                  @endif
              >{{ $empresas->nombre_empresa }}</option>
        @endforeach
      </select>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
      <label for="">Regional: </label>
      <select class="form-control" name="id_regional" style="border: solid 2px #EEE30B">
        @foreach($regional as $regionals)
              <option value="{{ $regionals->id }}"
                  @if($regionals->id == $sucursal->id_regional)
                      selected
                  @endif
              >{{ $regionals->nombre_regional }}</option>
        @endforeach
      </select>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
    <label for="">Nombre de la sucursal:</label>
    <input type="text" class="form-control" name="nombre_sucursal" value="{{ old('nombre_sucursal', $sucursal->nombre_sucursal) }}" placeholder="Introduzca el nombre de la Sucursal" style="border: solid 2px #EEE30B">
  </div>
</div>


<div class="form-group">
  <div class="col-sm-12">
    <label for="">Dirección de la sucursal:</label>
    <input type="text" class="form-control" name="direccion_sucursal" value="{{ old('direccion_sucursal', $sucursal->direccion_sucursal) }}" placeholder="Introduzca la dirección de la sucursal" style="border: solid 2px #EEE30B">
  </div>
</div>


<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
  <a href="{{ route('sucursal.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
