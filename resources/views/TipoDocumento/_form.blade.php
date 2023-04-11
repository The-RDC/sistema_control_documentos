<div class="form-group">
  <input type="text" class="form-control" name="referencia_documento" value="{{ old('referencia_documento', $tipoDocumento->referencia_documento) }}" placeholder="Introduzca Referencia del Documento">
</div>
<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit">Guardar</button>
  <a href="{{ route('tipoDocumento.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
