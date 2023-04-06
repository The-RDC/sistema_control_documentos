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
        return view('layouts.admin.categories.index', compact('empresa'));
    }

    public function create()
    {
        $empresa = new empresa();

        return view('layouts.admin.categories.create', compact('empresa'));
    }

    public function store(StoreRequest $request)
    {
        empresa::create($request->all());
        return redirect()->route('empresa.index');
    }

    public function show(empresa $empresa)
    {
        return view('layouts.admin.empresa.show', compact('empresa'));
    }

    public function edit(empresa $empresa)
    {
        return view('layouts.admin.empresa.edit', compact('empresa'));
    }

    public function update(UpdateRequest $request, empresa $empresa)
    {
        $empresa->update($request->all());
        return redirect()->route('empresa.index');
    }

    public function destroy(empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresa.index');
    }
}
