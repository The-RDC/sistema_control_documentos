<div class="form-group">
    <input type="text" class="form-control" name="nombre_cargo" value="{{ old('nombre_cargo', $cargo->nombre_cargo) }}" placeholder="introdusca el cargo" style="border: solid 2px #EEE30B">
    @if ($errors->has('nombre_cargo'))
        {{ $errors->first('nombre_cargo') }}
    @endif
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
    <a href="{{ route('cargo.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
