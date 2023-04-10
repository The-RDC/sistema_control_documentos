<?php

namespace App\Http\Controllers;

use App\Models\log_estado_documento;
use Illuminate\Http\Request;

class LogEstadoDocumentoController extends Controller
{
    public function index()
    {
        $logEstadoDocumento = log_estado_documento::get();
        return json_encode($logEstadoDocumento);
    }

    public function store(StoreRequest $request)
    {
        Cargo::create($request->all());
        return response()->json(['success'=>'Se guardo correctamente su categoria.']);
    }

    public function update(UpdateRequest $request, cargo $cargo)
    {
        $cargo->update($request->all());
        return response()->json(['success'=>'Se Actualizo correctamente su categoria.']);
    }

    public function destroy(Request $request, cargo $cargo)
    {
        $cargo->update([
            'estado' => $request->estado,
        ]);
        return response()->json(['success'=>'Se Elimino correctamente su categoria.']);
    }
}
