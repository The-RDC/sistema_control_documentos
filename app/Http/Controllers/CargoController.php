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
        return view('dashboard-admin.cargos.index', compact('cargo')).json_encode($cargo);
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

    public function edit($id){
        try {
            $cargo = Cargo::find($id);
            return view('edit', compact('cargo')).response()->json($cargo, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(UpdateRequest $request)
    {
        try {
            $data['nombre_cargo'] = $request['nombre_cargo'];
            cargo::find($request['id'])->update($data);
            $res = cargo::find($request['id']);
//            $cargo->update($request->all());

            return response()->json(['success'=>'Se Actualizo correctamente su categoria.'.$res]);
        }catch (\Throwable $th){
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function destroy(Request $request, cargo $cargo)
    {
        dd($request);
        $data['estado'] = $request['estado'];
        cargo::find($request['id'])->update($data);
        $res = cargo::find($request['id']);
        return response()->json(['success'=>'Se Elimino correctamente su categoria.']);
    }
}
