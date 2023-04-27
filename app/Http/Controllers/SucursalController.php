<?php

namespace App\Http\Controllers;

use App\Models\regional;
use App\Models\empresa;
use App\Models\sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\Sucursal\StoreRequest;
use App\Http\Requests\Sucursal\UpdateRequest;

class SucursalController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:sucursal-list|sucursal-create|sucursal-edit|sucursal-delete', ['only' => ['index','show']]);
        $this->middleware('permission:sucursal-create', ['only' => ['create','store']]);
        $this->middleware('permission:sucursal-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sucursal-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $sucursal = sucursal::get();
        $regional = regional::get();
        return view('Sucursal.index', compact('sucursal','regional'));
    }

    public function create()
    {
        $sucursal = new sucursal();
        $regional = regional::get();
        $empresaConDatos=empresa::get();
        return view('Sucursal.create', compact('sucursal','regional','empresaConDatos'));
    }

    public function store(StoreRequest $request)
    {
        sucursal::create($request->all());
        return redirect()->route('sucursal.index');
    }

    public function show(sucursal $sucursal)
    {
        return view('Sucursal.show', compact('sucursal'));
    }

    public function edit(sucursal $sucursal)
    {
        return view('Sucursal.edit', compact('sucursal'));
    }

    public function update(UpdateRequest $request, sucursal $sucursal)
    {
        $sucursal->update($request->all());
        return redirect()->route('sucursal.index');
    }

    public function destroy(sucursal $sucursal)
    {
        $sucursal->delete();
        return redirect()->route('sucursal.index');
    }
}
