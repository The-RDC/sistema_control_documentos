<div class="form-group">
    <input type="text" class="form-control" name="nombre_cargo" value="{{ old('nombre_cargo', $cargo->nombre_cargo) }}" placeholder="introdusca el cargo">
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit">Guardar</button>
    <a href="{{ route('cargo.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
