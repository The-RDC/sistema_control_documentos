<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroDocumento\StoreRequest;
use App\Http\Requests\RegistroDocumento\UpdateRequest;
use App\Models\empresa;
use App\Models\User;
use App\Models\estado_documento;
use App\Models\regional;
use App\Models\registro_documento;
use App\Models\sucursal;
use App\Models\tipo_documento;
use App\Models\unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroDocumentoController extends Controller
{
    function __construct()
    {
        $this->middleware('CheckPermissions:registroDocumento-list', ['only' => ['index', 'show']]);
        $this->middleware('CheckPermissions:registroDocumento-create', ['only' => ['create', 'store']]);
        $this->middleware('CheckPermissions:registroDocumento-edit', ['only' => ['edit', 'update']]);
        $this->middleware('CheckPermissions:registroDocumento-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        //dd(session('idsSucursalesUsuario')[session('idSucursalTrabajandoActualemte')]);
        $usuario = auth()->user();
        foreach ($usuario->roles as $role) {
            $rol = $role->name;
        }
        if (strtoupper($rol) === strtoupper('administrador'))
        {
            $data = registro_documento::getVistasDocumento($request);
            $empresa = empresa::get()->whereNull("deleted_at");
            $regional = regional::get()->whereNull("deleted_at");
            $sucursal = sucursal::get()->whereNull("deleted_at");
            $estado_documento = estado_documento::get()->whereNull("deleted_at");

            return view('RegistroDocumento.index', compact('data', 'empresa', 'regional', 'sucursal', 'estado_documento', 'rol'));
        }
        elseif (strtoupper($rol) === strtoupper('supervisor'))
        {
            $data = registro_documento::get()->whereIn('id_sucursal',session('idsSucursalesUsuario'));
            $empresa = empresa::get()->whereNull("deleted_at");
            $regional = regional::get()->whereNull("deleted_at");
            $sucursal = sucursal::get()->whereNull("deleted_at");
            $estado_documento = estado_documento::get()->whereNull("deleted_at");
            return view('RegistroDocumento.index', compact('data', 'empresa', 'regional', 'sucursal', 'estado_documento', 'rol'));
        }
        else {
            $data = registro_documento::whereIn('id_sucursal', session('idsSucursalesUsuario'))
                                        ->where('id_sucursal',session('idsSucursalesUsuario')[session('idSucursalTrabajandoActualemte')])
                                        ->get();
            $sucursal = sucursal::get()->whereNull("deleted_at");
            return view('RegistroDocumento.index', compact('data','rol','sucursal'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo_documento = tipo_documento::get();
        $unidad = unidad::get();
        $estado_documento = estado_documento::get();
        $registroDocumento = new registro_documento();

        return view('RegistroDocumento.create', compact('registroDocumento', 'tipo_documento', 'unidad', 'estado_documento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        dd($request);
        $request->validate([
            "numero_hoja_ruta"=>"required|unique:registro_documentos",
            "fecha_recepcion"=>"required",
            //"fecha_entrega"=>"required",
            //"fecha_final"=>"required",
            "documento_externo_interno"=>"required|in:Externo,Interno",
            "id_tipo_documento"=>"required|in:1,2,3,4,5,6,7,8,9,10",
            //"id_unidad_destino"=>"required|in:1,2,3,4,5,6,7,8,9,10"
            "id_estado_documentoo"=>"required|in:1,2,3,4,5,6,7,8,9,10"
        ]);

        $usuario = Auth::user();
        $empleado = $usuario->getEmpleado;
        $estado = $request->id_estado_documentoo;
        registro_documento::create($request->all() +
            [
                'id_estado_documento' => $estado,
                'id_usuario' => Auth::user()->id,
                //'empresa' => 'La Paz -0',//$empleado->getEmpresa->nombre_empresa,
                //'regional' => 'La Paz',// $empleado->getRegional->nombre_regional,
                'procedencia_documento'=>$request->documento_externo_interno,
                'id_sucursal' => session('idsSucursalesUsuario')[session('idSucursalTrabajandoActualemte')]//$usuario->destino_sucursal[0]->nombre_sucursal
            ]);
        return redirect()->route('registroDocumento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(registro_documento $registroDocumento)
    {
        $tipo_documento = tipo_documento::get();
        $unidad = unidad::get();
        $estado_documento = estado_documento::get();
        return view('RegistroDocumento.show', compact('registroDocumento', 'tipo_documento', 'unidad', 'estado_documento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(registro_documento $registroDocumento)
    {
        $tipo_documento = tipo_documento::get();
        $unidad = unidad::get();
        $estado_documento = estado_documento::get();
        return view('RegistroDocumento.edit', compact('registroDocumento', 'tipo_documento', 'unidad', 'estado_documento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, registro_documento $registroDocumento)
    {
        $request->validate([
            "numero_hoja_ruta"=>"required",
            "fecha_recepcion"=>"required",
            "fecha_entrega"=>"required",
            "fecha_final"=>"required",
            "id_tipo_documento"=>"required|in:1,2,3,4,5,6,7,8,9,10",
            "id_unidad_destino"=>"required|in:1,2,3,4,5,6,7,8,9,10",
            "id_estado_documentoo"=>"required|in:1,2,3,4,5,6,7,8,9,10"
        ]);
        $fechaF = $request->fecha_final;
        $estado = (is_null($fechaF)) ?: $estadoDocumento = 3;

        $registroDocumento->update($request->all() + [
            'id_estado_documento' => $estado
        ]);

        return redirect()->route('registroDocumento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(registro_documento $registroDocumento)
    {
        $registroDocumento->delete();
        return redirect()->route('registroDocumento.index');
    }

    public function editar(Request $request)
    {
        registro_documento::update(
            ['id' => $request->id],
            ['fecha_final' => $request->fecha_final, 'id_estado_documento' => $request->id_estado_documento]
        );

        return response()->json(['success' => 'Publicación guardada con éxito.']);
    }
}
