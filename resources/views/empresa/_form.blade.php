<div class="form-group">
    <input type="text" class="form-control" name="nombre_empresa" value="{{ old('nombre_empresa', $empresa->nombre_empresa) }}" placeholder="introdusca el empresa">
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit">Guardar</button>
    <a href="{{ route('empresa.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
