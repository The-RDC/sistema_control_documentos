<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Cargo\StoreRequest;
use App\Http\Requests\Cargo\UpdateRequest;

class CargoController extends Controller
{
    public function index()
    {
        $cargo = Cargo::get();
        return view('index', compact('cargo'));
    }

    public function create()
    {
        $cargo = new Cargo();
        return view('test', compact('cargo'));
    }

    public function store(StoreRequest $request)
    {
//        dd($request);
        Cargo::create($request->all());
        return redirect()->route('cargo.index');

    }

    public function show(cargo $cargo)
    {
        return view('layouts.admin.cargo.show', compact('cargo'));
    }

    public function edit(cargo $cargo)
    {
        return view('layouts.admin.cargo.edit', compact('cargo'));
    }

    public function update(UpdateRequest $request, cargo $cargo)
    {
        $cargo->update($request->all());
        return redirect()->route('cargo.index');
    }

    public function destroy(cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargo.index');
    }
}
