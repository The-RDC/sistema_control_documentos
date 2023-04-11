<?php

namespace App\Http\Controllers;

use App\Models\unidad;
use Illuminate\Http\Request;
use App\Http\Requests\Unidad\StoreRequest;
use App\Http\Requests\Unidad\UpdateRequest;

class UnidadController extends Controller
{
    public function index()
    {
        $unidades = unidad::get();
        return view('Unidad.index', compact('unidades'));
    }

    public function create()
    {
        $unidades = new unidad();
        return view('Unidad.create', compact('unidades'));
    }

    public function store(StoreRequest $request)
    {
        unidad::create($request->all());
        return redirect()->route('unidad.index');
    }

    public function show(unidad $unidades)
    {
        return view('Unidad.show', compact('unidades'));
    }

    public function edit(unidad $unidades)
    {
        return view('Unidad.edit', compact('unidades'));
    }

    public function update(UpdateRequest $request, unidad $unidades)
    {
        $unidades->update($request->all());
        return redirect()->route('unidad.index');
    }

    public function destroy(unidad $unidades)
    {
        $unidades->delete();
        return redirect()->route('unidad.index');
    }
}
