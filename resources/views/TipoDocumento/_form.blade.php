<div class="form-group">
  <input type="text" class="form-control" name="referencia_documento" value="{{ old('referencia_documento', $tipoDocumento->referencia_documento) }}" placeholder="Introduzca el tipo del documento" style="border: solid 2px #EEE30B">
    @error('referencia_documento')
        <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
    @enderror
</div>
<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
  <a href="{{ route('tipoDocumento.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
