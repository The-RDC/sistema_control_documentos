<div class="form-group">
  <input type="text" class="form-control" name="nombre_sucursal" value="{{ old('nombre_sucursal', $sucursal->nombre_sucursal) }}" placeholder="Introduzca el nombre de la Sucursal">
</div>
<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit">Guardar</button>
  <a href="{{ route('sucursal.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
