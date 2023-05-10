
<div class="form-group row">
  <div class="col-sm-6">
    <input type="text" name="id_registro_documento" value="{{$registroDocumento->id}}" hidden>
    <label for="num-hoja-ruta">Código Hoja Ruta</label>
    <input style="border: solid 2px #EEE30B" id="num-hoja-ruta" type="text" class="form-control" name="numero_hoja_ruta" value="{{ old('numero_hoja_ruta', $registroDocumento->numero_hoja_ruta) }}" placeholder="Introduzca el codigo de hoja de ruta">
    @error('numero_hoja_ruta')
        <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
    @enderror
  </div>
  <div class="col-sm-6">
    <label for="fecha-recepcion">Fecha de Recepción</label>
    <input style="border: solid 2px #EEE30B" id="fecha-recepcion" type="datetime-local" class="form-control" name="fecha_recepcion" value="@php echo old('fecha_recepcion', $registroDocumento->fecha_recepcion) @endphp" placeholder="Introduzca fecha recepción">
    @error('fecha_recepcion')
        <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
    @enderror
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label for="fec-entrega">Fecha Entrega</label>
    <input style="border: solid 2px #EEE30B" id="fec-entrega" type="datetime-local" class="form-control" name="fecha_entrega" value="{{ old('fecha_entrega', $registroDocumento->fecha_entrega) }}" placeholder="Introduzca el fecha entrega">
    @error('fecha_entrega')
        <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
    @enderror
  </div>
  <div class="col-sm-6">
    <label for="fec-final-documento">Fecha Final del Documento</label>
    <input style="border: solid 2px #EEE30B" id="fec-final-documento" type="datetime-local" class="form-control" name="fecha_final" value="{{ old('fecha_final', $registroDocumento->fecha_final) }}" placeholder="Introduzca el fecha final">
    @error('fecha_final')
        <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
    @enderror
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-4">
    <label for="id_tipo_documento">Documento Recepcionado</label>
        <select class="form-control" name="id_tipo_documento" id="id_tipo_documento" style="border: solid 2px #EEE30B">
            <option selected>Tipo Documento</option>
              @foreach($tipo_documento as $tipo_documentos)
                <option value="{{ $tipo_documentos->id }}"
                        @if($tipo_documentos->id == $registroDocumento->id_tipo_documento)
                        selected
                    @endif
                >{{ $tipo_documentos->referencia_documento }}</option>
            @endforeach
        </select>
        @error('id_tipo_documento')
            <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
        @enderror
  </div>
  <div class="col-sm-4">
    <label for="id_unidad_destino">Unidad de Destino</label>
        <select class="form-control" name="id_unidad_destino" id="id_unidad_destino" style="border: solid 2px #EEE30B">
            <option>--Seleccione una Unidad</option>
              @foreach($unidad as $unidades)
                <option value="{{ $unidades->id }}"
                        @if($unidades->id == $registroDocumento->id_unidad_destino)
                        selected
                    @endif
                >{{ $unidades->unidad_area }}</option>
            @endforeach
        </select>
        @error('id_unidad_destino')
            <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
        @enderror
  </div>
  <div class="col-sm-4">
    <label for="id_estado_documento">Estado Documento</label>
        <select class="form-control" name="id_estado_documento" id="id_estado_documento" style="border: solid 2px #EEE30B">
            <option selected>Estado Documento</option>
              @foreach($estado_documento as $estado_documentos)
                <option value="{{ $estado_documentos->id }}"
                        @if($estado_documentos->id == $registroDocumento->id_estado_documento)
                        selected
                    @endif
                >{{ $estado_documentos->estado_documento }}</option>
            @endforeach
        </select>
        @error('id_estado_documento')
            <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
        @enderror
  </div>
</div>
<div class="form-group">
  <label for="">Observaciones</label>
  <input style="border: solid 2px #EEE30B" type="text" class="form-control" name="observacion" value="{{ old('observacion', $registroDocumento->observacion) }}" placeholder="Introduzca la observacion del Documento">
</div>

<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
  <a href="{{ route('registroDocumento.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
</div>
<hr>
