<div class="form-group">
    <input type="text" class="form-control" name="estado_documento" value="{{ old('estado_documento', $estadoD->estado_documento) }}" placeholder="introdusca el Regional">
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit">Guardar</button>
    <a href="{{ route('regional.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
