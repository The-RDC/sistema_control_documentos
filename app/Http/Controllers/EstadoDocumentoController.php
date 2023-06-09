<?php

namespace App\Http\Controllers;

use App\Models\estado_documento;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoDocumento\StoreRequest;
use App\Http\Requests\EstadoDocumento\UpdateRequest;

class EstadoDocumentoController extends Controller
{
    function __construct()
    {
        $this->middleware('CheckPermissions:estadoDocumento-list', ['only' => ['index','show']]);
        $this->middleware('CheckPermissions:estadoDocumento-create', ['only' => ['create','store']]);
        $this->middleware('CheckPermissions:estadoDocumento-edit', ['only' => ['edit','update']]);
        $this->middleware('CheckPermissions:estadoDocumento-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $estadoDocumento = estado_documento::get();
        return view('estado_documento.index', compact('estadoDocumento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estadoDocumento = new estado_documento();

        return view('estado_documento.create', compact('estadoDocumento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $request->validate([
            "estado_documento"=>"required"
        ]);
        estado_documento::create($request->all());
        return redirect()->route('estadoDocumento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(estado_documento $estadoDocumento)
    {
        return view('estado_documento.show', compact('estadoDocumento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estado_documento $estadoDocumento)
    {
        return view('estado_documento.edit', compact('estadoDocumento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, estado_documento $estadoDocumento)
    {
        $request->validate([
            "estado_documento"=>"required"
        ]);
        $estadoDocumento->update($request->all());
        return redirect()->route('estadoDocumento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estado_documento $estadoDocumento)
    {
        $estadoDocumento->delete();
        return redirect()->route('estadoDocumento.index');

    }
}
