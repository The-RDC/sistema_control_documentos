<?php

namespace App\Http\Controllers;

use App\Models\tipo_documento;
use Illuminate\Http\Request;
use App\Http\Requests\tipoDocumento\StoreRequest;
use App\Http\Requests\tipoDocumento\UpdateRequest;

class TipoDocumentoController extends Controller
{
    public function index()
    {
        $tipoDocumento = tipo_documento::get();
        return view('layouts.admin.sucursal.index', compact('tipoDocumento'));
    }

    public function create()
    {
        $tipoDocumento = new tipo_documento();
        return view('layouts.admin.sucursal.create', compact('tipoDocumento'));
    }

    public function store(StoreRequest $request)
    {
        tipo_documento::create($request->all());
        return redirect()->route('tipoDocuemnto.index');
    }

    public function show(tipo_documento $tipoDocumento)
    {
        return view('layouts.admin.tipoDocuemnto.show', compact('tipoDocumento'));
    }

    public function edit(tipo_documento $tipoDocumento)
    {
        return view('layouts.admin.tipoDocuemnto.edit', compact('tipoDocumento'));
    }

    public function update(UpdateRequest $request, tipo_documento $tipoDocumento)
    {
        $tipoDocumento->update($request->all());
        return redirect()->route('tipoDocuemnto.index');
    }

    public function destroy(tipo_documento $tipoDocumento)
    {
        $tipoDocumento->delete();
        return redirect()->route('tipoDocuemnto.index');
    }
}
