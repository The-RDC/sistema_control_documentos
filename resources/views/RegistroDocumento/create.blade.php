@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar Nuevo Documento</h1>
                            </div>
                            <form method="POST" action="{{ route('registroDocumento.store') }}">
                                @csrf
                                {{-- @include('RegistroDocumento._form') --}}
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                      <label for="num-hoja-ruta">Código Hoja Ruta</label>
                                      <input style="border: solid 2px #EEE30B" id="num-hoja-ruta" type="text" class="form-control" name="numero_hoja_ruta" value="{{ old('numero_hoja_ruta', $registroDocumento->numero_hoja_ruta) }}" placeholder="Introduzca el codigo de hoja de ruta">
                                      @error('numero_hoja_ruta')
                                          <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                      @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="fecha-recepcion">Fecha de Recepción</label>
                                        <input style="border: solid 2px #EEE30B" id="fecha-recepcion" type="datetime-local" class="form-control" name="fecha_recepcion" value="@php echo old('fecha_recepcion', $registroDocumento->fecha_recepcion) @endphp" placeholder="Introduzca fecha recepción">
                                        @error('fecha_recepcion')
                                            <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                        @enderror
                                      </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <label for="id_unidad_destino">Procedencia del Documento</label>
                                            <select class="form-control" name="documento_externo_interno" id="documento_externo_interno" style="border: solid 2px #EEE30B">
                                                <option>--Seleccione una opcion--</option>
                                                <option>Externo</option>
                                                <option>Interno</option>
                                            </select>
                                            @error('documento_externo_interno')
                                                <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <label for="id_estado_documento">Estado Documento</label>
                                          <div id="controlInternoExterno">
                                            <select class="form-control" name="id_estado_documentoo" id="id_estado_documento" style="border: solid 2px #EEE30B"> 
                                                @foreach($estado_documento as $estado_documentos)
                                                  @if (strtoupper($estado_documentos->estado_documento) == strtoupper('recepcionado') )
                                                    <option value="{{ $estado_documentos->id }}"
                                                            @if($estado_documentos->id == $registroDocumento->id_estado_documento)
                                                            selected
                                                        @endif
                                                    >{{ $estado_documentos->estado_documento }}</option>
                                                  @endif
                                              @endforeach
                                          </select>
                                          </div>
                                            @error('id_estado_documentoo')
                                                <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                            @enderror
                                      </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <label for="id_tipo_documento">Documento Recepcionado</label>
                                            <select class="form-control" name="id_tipo_documento" id="id_tipo_documento" style="border: solid 2px #EEE30B">
                                                <option selected>--Documento--</option>
                                                  @foreach($tipo_documento as $tipo_documentos)
                                                    <option value="{{ $tipo_documentos->id }}"
                                                            @if($tipo_documentos->id == $registroDocumento->id_tipo_documento and strtoupper($tipo_documentos) == strtoupper('Recepcionado') )
                                                            selected
                                                        @endif
                                                        >{{ $tipo_documentos->referencia_documento }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_tipo_documento')
                                                <br><small class="alert alert-warning" role="alert">{{$message}}</small><br><br>
                                            @enderror
                                      </div>
                                </div>

                                  <div class="form-group">
                                    <label for="">Observaciones del documento: </label><br>
                                    <textarea name="observacion" id="observacion_recepcion" cols="55" rows="2" placeholder="Observaciones" style="border: solid 2px #EEE30B"></textarea>
                                    <!--input style="border: solid 2px #EEE30B" type="text" class="form-control" name="observacion" value="{{ old('observacion', $registroDocumento->observacion) }}" placeholder="Introduzca la observacion del Documento"-->
                                  </div>
                                  
                                  <div class="col-lg-12">
                                    <button  type="submit" class="btn btn-submit btn-success">Guardar</button>
                                    <a href="{{ route('registroDocumento.index') }}" class="btn btn-cancel btn-danger">Cancelar</a>
                                  </div>
                                  <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection