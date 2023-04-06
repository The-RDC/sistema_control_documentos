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
        $estadoDocumento = estado_documento::get();
        return view('layouts.admin.estado_documento.index', compact('estadoDocumento'));
    }

    public function create()
    {
        $estadoDocuemnto = new estado_documento();
        return view('layouts.admin.estado_documento.create', compact('estadoDocuemnto'));
    }

    public function store(StoreRequest $request)
    {
        estado_documento::create($request->all());
        return redirect()->route('estado_documento.index');
    }

    public function show(estado_documento $estadoDocumento)
    {
        return view('layouts.admin.estado_documento.show', compact('estadoDocumento'));
    }

    public function edit(estado_documento $estadoDocumento)
    {
        return view('layouts.admin.estado_documento.edit', compact('estadoDocumento'));
    }

    public function update(UpdateRequest $request, estado_documento $estadoDocumento)
    {
        $estadoDocumento->update($request->all());
        return redirect()->route('estado_documento.index');
    }

    public function destroy(estado_documento $estadoDocumento)
    {
        $estadoDocumento->delete();
        return redirect()->route('estado_documento.index');
    }
}
