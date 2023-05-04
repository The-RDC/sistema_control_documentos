<?php

namespace App\Http\Controllers;

use App\Models\sucursal;
use App\Models\empresa;
use App\Models\regional;
use Illuminate\Http\Request;
use App\Http\Requests\Sucursal\StoreRequest;
use App\Http\Requests\Sucursal\UpdateRequest;

class SucursalController extends Controller
{
    function __construct()
    {
        $this->middleware('CheckPermissions:sucursal-list', ['only' => ['index','show']]);
        $this->middleware('CheckPermissions:sucursal-create', ['only' => ['create','store']]);
        $this->middleware('CheckPermissions:sucursal-edit', ['only' => ['edit','update']]);
        $this->middleware('CheckPermissions:sucursal-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $sucursal = sucursal::get()->whereNull("deleted_at");
        $empresa = empresa::get()->whereNull("deleted_at");
        $regional = regional::get()->whereNull("deleted_at");
        return view('Sucursal.index', compact('sucursal','empresa','regional'));
    }

    public function create()
    {
        $sucursal = new sucursal();
        $empresa = empresa::get()->whereNull("deleted_at");
        $regional = regional::get()->whereNull("deleted_at");
        return view('Sucursal.create', compact('sucursal','empresa','regional'));
    }

    public function store(StoreRequest $request)
    {
        $nuevaSucursal = new sucursal();
        $nuevaSucursal->id_empresa = trim($request->id_empresa);
        $nuevaSucursal->id_regional = trim($request->id_regional);
        $nuevaSucursal->nombre_sucursal = trim($request->nombre_sucursal);
        $nuevaSucursal->direccion_sucursal = trim($request->direccion_sucursal);
        $nuevaSucursal->save();
        //sucursal::create($request->all());
        return redirect()->route('sucursal.index');
    }

    public function show(sucursal $sucursal)
    {
        return view('Sucursal.show', compact('sucursal'));
    }

    public function edit(sucursal $sucursal)
    {
        $empresa = empresa::get()->whereNull("deleted_at");
        $regional = regional::get()->whereNull("deleted_at");
        return view('Sucursal.edit', compact('sucursal','empresa','regional'));
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
