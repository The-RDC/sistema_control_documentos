<?php

namespace App\Http\Controllers;

use App\Models\unidad;
use Illuminate\Http\Request;
use App\Http\Requests\Unidad\StoreRequest;
use App\Http\Requests\Unidad\UpdateRequest;

class UnidadController extends Controller
{
    function __construct()
    {
        $this->middleware('CheckPermissions:unidad-list', ['only' => ['index','show']]);
        $this->middleware('CheckPermissions:unidad-create', ['only' => ['create','store']]);
        $this->middleware('CheckPermissions:unidad-edit', ['only' => ['edit','update']]);
        $this->middleware('CheckPermissions:unidad-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $unidad = unidad::get();
        return view('Unidad.index', compact('unidad'));
    }

    public function create()
    {
        $unidad = new unidad();
        return view('Unidad.create', compact('unidad'));
    }

    public function store(StoreRequest $request)
    {
        unidad::create($request->all());
        return redirect()->route('unidad.index');
    }

    public function show(unidad $unidad)
    {
        return view('Unidad.show', compact('unidad'));
    }

    public function edit(unidad $unidad)
    {
        return view('Unidad.edit', compact('unidad'));
    }

    public function update(UpdateRequest $request, unidad $unidad)
    {
        $unidad->update($request->all());
        return redirect()->route('unidad.index');
    }

    public function destroy(unidad $unidad)
    {
        $unidad->delete();
        return redirect()->route('unidad.index');
    }
}
