<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\empleado;
use App\Models\empresa;
use App\Models\regional;
use App\Models\sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\Empleado\StoreRequest;
use App\Http\Requests\Empleado\UpdateRequest;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleado = empleado::get();
        return view('empleado.index', compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regional = regional::get();
        $sucursal = sucursal::get();
        $empresa = empresa::get();
        $cargo = Cargo::get();
        $empleado = new empleado();

        return view('empleado.create', compact('empleado','regional','sucursal','empresa','cargo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
//        dd($request->all());
        empleado::create($request->all());
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        return view('layouts.admin.categories.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empleado $empleado)
    {
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, empleado $empleado)
    {
        $empleado->update($request->all());
        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleado.index');

    }
}
