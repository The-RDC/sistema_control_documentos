<div class="form-group row">
  <div class="col-sm-6">
    <label for="num-hoja-ruta">Codigo Hoja Ruta</label>
    <input id="num-hoja-ruta" type="text" class="form-control" name="numero_hoja_ruta" value="{{ old('numero_hoja_ruta', $registroDocumento->numero_hoja_ruta) }}" placeholder="Introduzca el codigo de hoja de ruta">
  </div>
  <div class="col-sm-6">
    <label for="fecha-recepcion">Fecha de Recepcion</label>
    <input id="fecha-recepcion" type="date" class="form-control" name="fecha_recepcion" value="{{ old('fecha_recepcion', $registroDocumento->fecha_recepcion) }}" placeholder="Introduzca fecha recepcion">
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label for=""></label>
    <input id="" type="datet" class="form-control" name="fecha_entrega" value="{{ old('fecha_entrega', $registroDocumento->fecha_entrega) }}" placeholder="Introduzca el fecha entrega">
  </div>
  <div class="col-sm-6">
    <label for=""></label>
    <input id="" type="text" class="form-control" name="fecha_final" value="{{ old('fecha_final', $registroDocumento->fecha_final) }}" placeholder="Introduzca el fecha final">
  </div>
</div>





<div class="form-group">
  <input type="text" class="form-control" name="id_tipo_documento" value="{{ old('id_tipo_documento', $registroDocumento->id_tipo_documento) }}" placeholder="Introduzca el id tipo documento">
</div>
<div class="form-group">
  <input type="text" class="form-control" name="id_unidad_destino" value="{{ old('id_unidad_destino', $registroDocumento->id_unidad_destino) }}" placeholder="Introduzca el id_unidad_destino">
</div>
<div class="form-group">
  <input type="text" class="form-control" name="id_estado_documento" value="{{ old('id_estado_documento', $registroDocumento->id_estado_documento) }}" placeholder="Introduzca el id_estado_documento">
</div>

<div class="col-lg-12">
  <button  type="submit" class="btn btn-submit">Guardar</button>
  <a href="{{ route('registroDocumento.index') }}" class="btn btn-cancel">Cancelar</a>
</div>
<hr>
