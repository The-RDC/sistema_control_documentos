<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\detalle_empresa_sucursales;
use App\Models\detalle_empleado_sucursal;
use App\Models\detalle_empleado_empresa;
use App\Models\empleado;
use App\Models\empresa;
use App\Models\EstadoCivil;
use App\Models\Genero;
use App\Models\regional;
use App\Models\sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\Empleado\StoreRequest;
use App\Http\Requests\Empleado\UpdateRequest;

class EmpleadoController extends Controller
{
    function __construct()
    {
        $this->middleware('CheckPermissions:empleado-list', ['only' => ['index','show']]);
        $this->middleware('CheckPermissions:empleado-create', ['only' => ['create','store']]);
        $this->middleware('CheckPermissions:empleado-edit', ['only' => ['edit','update']]);
        $this->middleware('CheckPermissions:empleado-delete', ['only' => ['destroy']]);
    }

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
        $empresa = empresa::get();
        $cargo = Cargo::get();
        $genero = Genero::get();
        $estaCivil = EstadoCivil::get();
        $empSuc = detalle_empresa_sucursales::get();
        $empleado = new empleado();

        return view('empleado.create', compact('empleado','empresa','cargo', 'genero', 'estaCivil', 'empSuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $nuevoEmpleado=empleado::create($request->all());
        foreach ($request->sucursales as $key => $value) {
            $dataIdSucursal=json_decode($value,true);
            $resultadoEmpleadoSucursal[] = array("id_empleado" => $nuevoEmpleado->id, "id_sucursal" => $dataIdSucursal["id_sucursal"]);
            $resultadoEmpleadoEmpresa[] = array("id_empleado" => $nuevoEmpleado->id, "id_empresa" => $dataIdSucursal["id_empresa"]);
        }
        $nuevoEmpleado->detalle_empleado_sucursales()->createMany($resultadoEmpleadoSucursal);
        $nuevoEmpleado->detalle_empleado_empresas()->createMany($resultadoEmpleadoEmpresa);
        
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empleado $empleado)
    {
        $regional = regional::get();
        $sucursal = sucursal::get();
        $empresa = empresa::get();
        $cargo = Cargo::get();
        $genero = Genero::get();
        $estaCivil = EstadoCivil::get();
        return view('empleado.edit', compact('empleado','regional', 'sucursal', 'empresa', 'cargo', 'genero', 'estaCivil'));
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
