<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroDocumento\StoreRequest;
use App\Http\Requests\RegistroDocumento\UpdateRequest;
use App\Models\empresa;
use App\Models\observacion;
use App\Models\procedenciaDocumento;
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
        $usuario = auth()->user();
//        dd($usuario);
        foreach ($usuario->roles as $role) {
            $rol = $role->name;
        }



        if (strtoupper($rol) === strtoupper('administrador'))
        {
            $data = registro_documento::getVistasDocumento($request);
            $empresa = empresa::get()->whereNull("deleted_at");
            $regional = regional::get()->whereNull("deleted_at");
            $sucursal = sucursal::get()->whereNull("deleted_at");
            $observacion = observacion::get()->whereNull("deleted_at");
            $estado_documento = estado_documento::get()->whereNull("deleted_at");
            return view('RegistroDocumento.index', compact('data', 'empresa', 'regional', 'sucursal',  'rol', 'observacion', 'estado_documento' ));
        }
        elseif (strtoupper($rol) === strtoupper('supervisor'))
        {

            $procedencia = procedenciaDocumento::get()->whereNull("deleted_at");
            $query = registro_documento::query();
            if (empty($request->empresa) && empty($request->regional) && empty($request->sucursal) && empty($request->procedencia)){
                $query->get()->whereIn('id_sucursal',session('idsSucursalesUsuario'));
                $empresa = empresa::get()->whereNull("deleted_at");
                $regional = regional::get()->whereNull("deleted_at");
                $sucursal = sucursal::get()->whereNull("deleted_at");
                $observacion = observacion::get()->whereNull("deleted_at");
                $estado_documento = estado_documento::get()->whereNull("deleted_at");
            }
            if (!empty($request->empresa)) {
                $query->select('registro_documentos.*')
                    ->distinct()
                    ->join('sucursales', 'sucursales.id', '=', 'registro_documentos.id_sucursal')
                    ->join('empresas', 'empresas.id', '=', 'sucursales.id_empresa')
                    ->join('regionales', 'regionales.id_empresa', '=', 'empresas.id')
                    ->where('empresas.id', $request->empresa);
            }

            if (!empty($request->regional)) {
                $query->select('registro_documentos.*')
                    ->distinct()
                    ->join('sucursales', 'sucursales.id', '=', 'registro_documentos.id_sucursal')
                    ->join('empresas', 'empresas.id', '=', 'sucursales.id_empresa')
                    ->join('regionales', 'regionales.id_empresa', '=', 'empresas.id')
                    ->where('regionales.id_empresa', $request->regional);
            }
            if (!empty($request->sucursal)) {
                $query->where('id_sucursal', $request->sucursal);
            }
            if (!empty($request->estado)) {
                $query->where('id_estado_documento', $request->estado);
            }
            // Obtener los registros filtrados
            $data = $query->get();
            return view('RegistroDocumento.index', compact('data', 'empresa', 'regional', 'sucursal', 'rol', 'procedencia', 'observacion', 'estado_documento'));
        }
        else {
            $data = registro_documento::whereIn('id_sucursal', session('idsSucursalesUsuario'))
                                        ->where('id_sucursal',session('idsSucursalesUsuario')[session('idSucursalTrabajandoActualemte')])->where('id_usuario', $usuario->id)
                                        ->get();
            $observacion = observacion::get()->whereNull("deleted_at");
            $estado_documento = estado_documento::get()->whereNull("deleted_at");
            $sucursal = sucursal::get()->whereNull("deleted_at");
            return view('RegistroDocumento.index', compact('data','rol','observacion','sucursal', 'estado_documento'));
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
//    public function store(StoreRequest $request)
//    {
//        $request->validate([
//            "numero_hoja_ruta"=>"required|unique:registro_documentos",
//            "fecha_recepcion"=>"required",
//            //"fecha_entrega"=>"required",
//            //"fecha_final"=>"required",
//            "id_tipo_documento"=>"required|in:1,2,3,4,5,6,7,8,9,10",
//            //"id_unidad_destino"=>"required|in:1,2,3,4,5,6,7,8,9,10"
//            "id_estado_documento"=>"required|in:1,2,3,4,5,6,7,8,9,10"
//        ]);
//
//        $usuario = Auth::user();
//        $empleado = $usuario->getEmpleado;
//
//        registro_documento::create($request->all() +
//            [
//                'id_estado_documento' => $request->id_estado_documento,
//                'id_usuario' => Auth::user()->id,
//                //'empresa' => 'La Paz -0',//$empleado->getEmpresa->nombre_empresa,
//                //'regional' => 'La Paz',// $empleado->getRegional->nombre_regional,
//                //'procedencia_documento'=>$request->documento_externo_interno,
//                'id_sucursal' => session('idsSucursalesUsuario')[session('idSucursalTrabajandoActualemte')]//$usuario->destino_sucursal[0]->nombre_sucursal
//            ]);
//        return redirect()->route('registroDocumento.index');



    public function store(StoreRequest $request)
    {
        $request->validate([
            "numero_hoja_ruta"=>"required|unique:registro_documentos",
            "fecha_recepcion"=>"required",
            //"fecha_entrega"=>"required",
            //"fecha_final"=>"required",
            "id_tipo_documento"=>"required|in:1,2,3,4,5,6,7,8,9,10",
            //"id_unidad_destino"=>"required|in:1,2,3,4,5,6,7,8,9,10"
            "id_estado_documento"=>"required|in:1,2,3,4,5,6,7,8,9,10"
        ]);
        $usuario = Auth::user();
        $empleado = $usuario->getEmpleado;

        registro_documento::create($request->all() +
            $nuevoDocumento=registro_documento::create($request->all() +
                [
                    'id_estado_documento' => $request->id_estado_documento,
                    'id_usuario' => Auth::user()->id,
                    //'empresa' => 'La Paz -0',//$empleado->getEmpresa->nombre_empresa,
                    //'regional' => 'La Paz',// $empleado->getRegional->nombre_regional,
                    //'procedencia_documento'=>$request->documento_externo_interno,
                    'id_sucursal' => session('idsSucursalesUsuario')[session('idSucursalTrabajandoActualemte')]//$usuario->destino_sucursal[0]->nombre_sucursal
                ]));

        observacion::create([
            "observacion_documento"=>$request->observacion,
            "id_registro_documento"=>$nuevoDocumento->id,
            "id_estado_documento"=>$request->id_estado_documento
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
            //"fecha_final"=>"required",
            "id_tipo_documento"=>"required|in:1,2,3,4,5,6,7,8,9,10",
            "id_unidad_destino"=>"required|in:1,2,3,4,5,6,7,8,9,10",
            "id_estado_documento"=>"required|in:1,2,3,4,5,6,7,8,9,10"
        ]);
        $fechaF = $request->fecha_final;
        $estado = (is_null($fechaF)) ?: $estadoDocumento = 3;

        $registroDocumento->update($request->all() + [
            'id_estado_documento' => $estado
        ]);
        observacion::create([
            "observacion_documento"=>$request->observacion,
            "id_registro_documento"=>$request->id_registro_documento,
            "id_estado_documento"=>$request->id_estado_documento
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

    public function informacionRegistroDocumento(Request $request)
    {
        return json_encode(registro_documento::get()->find($request->id_documento));
    }

//    cambiar opciones de select
    public function obtenerOpciones(Request $request)
    {
        $opciones = estado_documento::where('id_procedencia_documento', $request->valor)->get();
        return response()->json($opciones);
    }
}
