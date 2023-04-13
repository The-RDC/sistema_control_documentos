<div class="form-group">
    <input type="text" class="form-control" name="estado_documento" value="{{ old('estado_documento', $estadoDocumento->estado_documento) }}" placeholder="introdusca el Regional" style="border: solid 2px #EEE30B">
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
    <a href="{{ route('regional.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
