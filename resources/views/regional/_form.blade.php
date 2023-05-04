<div class="form-group">
    <div class="col-sm-12">
        <label for="">Empresa: </label>
        <select class="form-control" name="id_empresa" style="border: solid 2px #EEE30B">
            @foreach($empresa as $empresas)
                <option value="{{ $empresas->id }}"
                        @if($empresas->id == $regional->id_empresa)
                        selected
                    @endif
                >{{ $empresas->nombre_empresa }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <input type="text" class="form-control" name="nombre_regional" value="{{ old('nombre_regional', $regional->nombre_regional) }}" placeholder="Introduzca la Regional" style="border: solid 2px #EEE30B">     
    </div>
</div>

<div class="col-lg-12">
    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
    <a href="{{ route('regional.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
