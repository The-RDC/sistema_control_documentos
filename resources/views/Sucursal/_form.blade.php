
<div class="form-group">
  <label for="">Nombre de la sucursal:</label>
  <input type="text" class="form-control" name="nombre_sucursal" value="{{ old('nombre_sucursal', $sucursal->nombre_sucursal) }}" placeholder="Introduzca el nombre de la Sucursal" style="border: solid 2px #EEE30B">
</div>
<div class="form-group">
  <label for="">Dirección de la sucursal:</label>
  <input type="text" class="form-control" name="direccion_sucursal" value="{{ old('direccion_sucursal', $sucursal->direccion_sucursal) }}" placeholder="Introduzca la dirección de la sucursal" style="border: solid 2px #EEE30B">
</div>
<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
  <a href="{{ route('sucursal.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
