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
use Illuminate\Support\Facades\DB;
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
        $regional = regional::get()->whereNull("deleted_at");
        $empresa = empresa::get()->whereNull("deleted_at");
        $sucursal = sucursal::get()->whereNull("deleted_at");
        $cargo = Cargo::get()->whereNull("deleted_at");
        $genero = Genero::get()->whereNull("deleted_at");
        $estaCivil = EstadoCivil::get()->whereNull("deleted_at");
        $empSuc = detalle_empresa_sucursales::get()->where('estado', 1);
        $empleadoSucursal= detalle_empleado_sucursal::get()
                           ->where('estado',1)
                           ->whereNull("deleted_at");
        $empleado = new empleado();

        return view('empleado.create', compact('empleado','regional','empresa', 'sucursal','cargo', 'genero', 'estaCivil', 'empSuc','empleadoSucursal'));
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
        $empSuc = detalle_empresa_sucursales::get();
        $empleadoEmpresa = detalle_empleado_empresa::get();
        $empleadoSucursal= detalle_empleado_sucursal::get()->where('id_empleado',$empleado->id) -> where('estado',1);

        return view('empleado.edit', compact('empleado','regional', 'sucursal', 'empresa', 'cargo', 'genero', 'estaCivil', 'empSuc','empleadoEmpresa','empleadoSucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, empleado $empleado, detalle_empleado_sucursal $detalleEmpleadoSucursal, detalle_empresa_sucursales $detalleEmpresaSucursal)
    {  
        // dd($request->sucursales);      
        $empleado->update($request->all());
        $registrosEmpleadoSucursalActivos = detalle_empleado_sucursal::where('id_empleado', $empleado->id)
                                                                      ->where('estado','=',1)
                                                                      ->pluck('id_sucursal')
                                                                      ->toArray();
        $idsSucursales=array();
        if(!empty($request->sucursales))
        {
            foreach ($request->sucursales as $key => $value) 
            {
                $idsSucursalEnvVistaEditEmpleado=json_decode($value,true);
                if(!in_array($idsSucursalEnvVistaEditEmpleado["id_sucursal"], $registrosEmpleadoSucursalActivos))
                {
                    $resultadoEmpleadoSucursal[] = array("id_empleado" => $empleado->id, "id_sucursal" => $idsSucursalEnvVistaEditEmpleado["id_sucursal"]);
                }
                array_push($idsSucursales,$idsSucursalEnvVistaEditEmpleado["id_sucursal"]);
                //$resultadoEmpleadoEmpresa[] = array("id_empleado" => $empleado->id, "id_empresa" => $idsSucursalEnvVistaEditEmpleado["id_empresa"]);
            }
        }
        
        $nuevoEmpleado=new empleado();
        if (!empty($registrosEmpleadoSucursalActivos)) 
        {
            foreach ($registrosEmpleadoSucursalActivos as $registrosEmpleadoSucursalActivosItem) 
            { 
                if (!in_array($registrosEmpleadoSucursalActivosItem,$idsSucursales))
                {
                    $nuevoEmpleado->actualizarEstadoDetalleEmpleadoSucursal($empleado->id, $registrosEmpleadoSucursalActivosItem );
                }
            }
        }
        

        if(!empty($resultadoEmpleadoSucursal))
        {
            $empleado->detalle_empleado_sucursales()->createMany($resultadoEmpleadoSucursal);
        }
        
        //$empleado->detalle_empleado_empresas()->createMany($resultadoEmpleadoEmpresa);

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
