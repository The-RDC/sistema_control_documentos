<?php

namespace App\Http\Controllers;

use App\Models\registro_documento;
use Illuminate\Http\Request;

class RegistroDocumentoController extends Controller
{
    public function index()
    {
        $registroDocumento = registro_documento::get();
        return view('RegistroDocumento.index', compact('registroDocumento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $registroDocumento = new registro_documento();

        return view('RegistroDocumento.create', compact('registroDocumento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
//        dd($request->all());
        registroDocumento::create($request->all());
        return redirect()->route('registroDocumento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(registro_documento $registroDocumento)
    {
        return view('RegistroDocumento.show', compact('registroDocumento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(registro_documento $registroDocumento)
    {
        return view('registroDocumento.edit', compact('registroDocumento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, registro_documento $registroDocumento)
    {
        $registroDocumento->update($request->all());
        return redirect()->route('registroDocumento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(registro_documento $registroDocumento)
    {
        $registroDocumento->delete();
        return redirect()->route('registroDocumento.index');

    }
}
