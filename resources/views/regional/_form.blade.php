<div class="form-group">
    <input type="text" class="form-control" name="nombre_regional" value="{{ old('nombre_regional', $regional->nombre_regional) }}" placeholder="Introduzca la Regional" style="border: solid 2px #EEE30B">
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
    <a href="{{ route('regional.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
