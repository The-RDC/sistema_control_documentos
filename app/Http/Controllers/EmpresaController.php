<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;
use App\Http\Requests\Empresa\StoreRequest;
use App\Http\Requests\Empresa\UpdateRequest;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = empresa::get();
        return view('empresa.index', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresa = new empresa();

        return view('empresa.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
//        dd($request->all());
        empresa::create($request->all());
        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(empresa $empresa)
    {
        return view('layouts.admin.categories.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empresa $empresa)
    {
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, empresa $empresa)
    {
        $empresa->update($request->all());
        return redirect()->route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresa.index');

    }
}
