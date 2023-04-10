<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;
use App\Http\Requests\Empresa\StoreRequest;
use App\Http\Requests\Empresa\UpdateRequest;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = empresa::get();
        return json_encode($empresa);
    }

    public function store(StoreRequest $request)
    {
        empresa::create($request->all());
        return response()->json(['success'=>'Se guardo correctamente su categoria.']);
    }

    public function update(UpdateRequest $request, empresa $empresa)
    {
        $empresa->update($request->all());
        return response()->json(['success'=>'Se Actualizo correctamente su categoria.']);
    }

    public function destroy(Request $request, empresa $empresa)
    {
        $empresa->update([
            'estado' => $request->estado,
        ]);
        return response()->json(['success'=>'Se Elimino correctamente su categoria.']);
    }
}
