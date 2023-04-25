<?php

namespace App\Http\Controllers;

use App\Models\detalle_empresa_sucursales;
use App\Models\empresa;
use App\Models\regional;
use App\Models\sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\Empresa\StoreRequest;
use App\Http\Requests\Empresa\UpdateRequest;

class EmpresaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:empresa-list|empresa-create|empresa-edit|empresa-delete', ['only' => ['index','show']]);
        $this->middleware('permission:empresa-create', ['only' => ['create','store']]);
        $this->middleware('permission:empresa-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empresa-delete', ['only' => ['destroy']]);
    }

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
        $regional = regional::get();
        $sucursales = sucursal::get();
        $sucurid = [];
        return view('empresa.create', compact('empresa', 'regional', 'sucursales', 'sucurid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $empresa = empresa::create($request->all());


        foreach ($request->sucursales as $key => $sos){
            $results[] = array("id_empresa" => $empresa->id, "id_sucursal"=>$request->sucursales[$key]);
        }
//        dd($results);
        $empresa->detalle_empresa_sucursales()->createMany($results);

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

        $regional = regional::get();
        $sucursales = sucursal::get();
        $sucurid = detalle_empresa_sucursales::where('id_empresa', $empresa->id)->pluck('id_sucursal')->toArray();

        return view('empresa.edit', compact('empresa', 'regional', 'sucursales', 'sucurid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, empresa $empresa)
    {
        $empresa->update($request->all());

        foreach ($request->sucursales as $key => $sos){
            $results[] = array("id_empresa" => $empresa->id, "id_sucursal"=>$request->sucursales[$key]);
        }
        dd($results);
        $empresa->detalle_empresa_sucursales()->createMany($results);

        $usuario->roles()->syncWithoutDetaching($rolesIds);
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
