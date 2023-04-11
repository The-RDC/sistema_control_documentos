<?php

namespace App\Http\Controllers;

use App\Models\estado_documento;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoDocumento\StoreRequest;
use App\Http\Requests\EstadoDocumento\UpdateRequest;

class EstadoDocumentoController extends Controller
{
    public function index()
    {
        $EstadoDocumento = estado_documento::get();
        return view('documento.index',compact('EstadoDocumento')).json_encode($EstadoDocumento);
    }

    public function store(StoreRequest $request)
    {
        estado_documento::create($request->all());
        return response()->json(['success'=>'Se guardo correctamente su categoria.']);
    }

    public function update(UpdateRequest $request, estado_documento $estadoDocumento)
    {
        $estadoDocumento->update($request->all());
        return response()->json(['success'=>'Se Actualizo correctamente su categoria.']);
    }

    public function destroy(Request $request, estado_documento $estadoDocumento)
    {
        $estadoDocumento->update([
            'estado' => $request->estado,
        ]);
        return response()->json(['success'=>'Se Elimino correctamente su categoria.']);
    }
}
