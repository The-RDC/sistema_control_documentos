<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Cargo\StoreRequest;
use App\Http\Requests\Cargo\UpdateRequest;

class CargoController extends Controller
{
    public function index()
    {
        $cargo = Cargo::get();
        return json_encode($cargo);
    }
    public function create()
    {
        return view('test');
    }

    public function store(StoreRequest $request)
    {
        Cargo::create($request->all());
        return response()->json(['success'=>'Se guardo correctamente su categoria.']);
    }

    public function edit(cargo $cargo){
        try {
            return response()->json($cargo, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
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
