<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use App\Http\Requests\Empleado\StoreRequest;
use App\Http\Requests\Empleado\UpdateRequest;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleado = empleado::get();
        return json_encode($empleado);
    }

    public function store(StoreRequest $request)
    {
        empleado::create($request->all());
        return response()->json(['success'=>'Se guardo correctamente su categoria.']);
    }

    public function update(UpdateRequest $request, empleado $empleado)
    {
        $empleado->update($request->all());
        return response()->json(['success'=>'Se Actualizo correctamente su categoria.']);
    }

    public function destroy(Request $request, empleado $empleado)
    {
        $empleado->update([
            'estado' => $request->estado,
        ]);
        return response()->json(['success'=>'Se Elimino correctamente su categoria.']);
    }
}
