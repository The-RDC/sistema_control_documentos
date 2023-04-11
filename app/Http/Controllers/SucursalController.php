<?php

namespace App\Http\Controllers;

use App\Models\sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\Sucursal\StoreRequest;
use App\Http\Requests\Sucursal\UpdateRequest;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursal = sucursal::get();
        return view('Sucursal.index', compact('sucursal'));
    }

    public function create()
    {
        $sucursal = new sucursal();
        return view('Sucursal.create', compact('sucursal'));
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
