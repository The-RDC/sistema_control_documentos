<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Cargo\StoreRequest;
use App\Http\Requests\Cargo\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class CargoController extends Controller
{
    function __construct()
    {
        $this->middleware('CheckPermissions:cargo-list', ['only' => ['index','show']]);
        $this->middleware('CheckPermissions:cargo-create', ['only' => ['create','store']]);
        $this->middleware('CheckPermissions:cargo-edit', ['only' => ['edit','update']]);
        $this->middleware('CheckPermissions:cargo-delete', ['only' => ['destroy']]);

    }


    public function index()
    {
        $cargo = Cargo::get();
        return view('Cargo.index', compact('cargo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargo = new cargo();

        return view('Cargo.create', compact('cargo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $request->validate([
            "nombre_cargo"=>"required"
        ]);
        cargo::create($request->all());
        return redirect()->route('cargo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(cargo $cargo)
    {
        return view('layouts.admin.categories.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cargo $cargo)
    {
        return view('Cargo.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, cargo $cargo)
    {
        $request->validate([
            "nombre_cargo"=>"required"
        ]);
        $cargo->update($request->all());
        return redirect()->route('cargo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargo.index');

    }
}
