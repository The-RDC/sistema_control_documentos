<?php

namespace App\Http\Controllers;

use App\Models\tipo_documento;
use Illuminate\Http\Request;
use App\Http\Requests\tipoDocumento\StoreRequest;
use App\Http\Requests\tipoDocumento\UpdateRequest;

class TipoDocumentoController extends Controller
{
    function __construct()
    {
        $this->middleware('CheckPermissions:tipoDocumento-list', ['only' => ['index','show']]);
        $this->middleware('CheckPermissions:tipoDocumento-create', ['only' => ['create','store']]);
        $this->middleware('CheckPermissions:tipoDocumento-edit', ['only' => ['edit','update']]);
        $this->middleware('CheckPermissions:tipoDocumento-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $tipoDocumento = tipo_documento::get();
        return view('TipoDocumento.index', compact('tipoDocumento'));
    }

    public function create()
    {
        $tipoDocumento = new tipo_documento();
        return view('TipoDocumento.create', compact('tipoDocumento'));
    }

    public function store(StoreRequest $request)
    {
        $request->validate([
            "referencia_documento"=>"required"
        ]);

        tipo_documento::create($request->all());
        return redirect()->route('tipoDocumento.index');
    }

    public function show(tipo_documento $tipoDocumento)
    {
        return view('TipoDocumento.show', compact('tipoDocumento'));
    }

    public function edit(tipo_documento $tipoDocumento)
    {
        return view('TipoDocumento.edit', compact('tipoDocumento'));
    }

    public function update(UpdateRequest $request, tipo_documento $tipoDocumento)
    {
        $request->validate([
            "referencia_documento"=>"required"
        ]);
        $tipoDocumento->update($request->all());
        return redirect()->route('tipoDocumento.index');
    }

    public function destroy(tipo_documento $tipoDocumento)
    {
        $tipoDocumento->delete();
        return redirect()->route('tipoDocumento.index');
    }
}
