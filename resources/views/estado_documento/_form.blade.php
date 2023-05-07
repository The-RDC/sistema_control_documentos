<div class="form-group">
    <input type="text" class="form-control" name="estado_documento" value="{{ old('estado_documento', $estadoDocumento->estado_documento) }}" placeholder="Introduzca un estaod de Documento" style="border: solid 2px #EEE30B">
    @error('estado_documento')
        <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
    @enderror
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
    <a href="{{ route('estadoDocumento.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
