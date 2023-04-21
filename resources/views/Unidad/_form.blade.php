<div class="form-group">
  <input type="text" class="form-control" name="unidad_area" value="{{ old('unidad_area', $unidad->unidad_area) }}" placeholder="Introduzca la Unidad o o Área" style="border: solid 2px #EEE30B">
</div>
<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
  <a href="{{ route('unidad.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
