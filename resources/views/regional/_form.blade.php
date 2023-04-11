<div class="form-group">
    <input type="text" class="form-control" name="nombre_regional" value="{{ old('nombre_regional', $regional->nombre_regional) }}" placeholder="introdusca el Regional">
</div>
<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit">Guardar</button>
    <a href="{{ route('regional.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
