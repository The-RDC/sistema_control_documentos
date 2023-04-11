<div class="form-group">
  <input type="text" class="form-control" name="unidad_area" value="{{ old('unidad_area', $unidad->unidad_area) }}" placeholder="Introduzca el Unidad o Area">
</div>
<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit">Guardar</button>
  <a href="{{ route('unidad.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
