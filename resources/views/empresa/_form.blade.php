<div class="form-group">
    <input type="text" class="form-control" name="nombre_empresa" value="{{ old('nombre_empresa', $empresa->nombre_empresa) }}" placeholder="Introduzca la empresa"style="border: solid 2px #EEE30B">
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
    <a href="{{ route('empresa.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
