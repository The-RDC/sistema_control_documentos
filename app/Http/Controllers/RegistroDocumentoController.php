<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroDocumento\StoreRequest;
use App\Http\Requests\RegistroDocumento\UpdateRequest;
use App\Models\estado_documento;
use App\Models\registro_documento;
use App\Models\tipo_documento;
use App\Models\unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroDocumentoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:registroDocumento-list|registroDocumento-create|registroDocumento-edit|registroDocumento-delete', ['only' => ['index','show']]);
        $this->middleware('permission:registroDocumento-create', ['only' => ['create','store']]);
        $this->middleware('permission:registroDocumento-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:registroDocumento-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $tipo_documento = tipo_documento::get();
        $unidad = unidad::get();
        $estado_documento = estado_documento::get();
        $registroDocumento = registro_documento::get();
        //dd($tipo_documento);
        return view('RegistroDocumento.index', compact('registroDocumento', 'tipo_documento', 'unidad', 'estado_documento'));
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
//        dd($request->all());
        $usuario = Auth::user();
        $empleado = $usuario->getEmpleado;
        dd($empleado);

        $sucursal = $empleado->getSucursalUser;
         $estado = $request->id_estado_documentoo;
        registro_documento::create($request->all()+
            [
                'id_estado_documento' => $estado,
                'id_usuario' => Auth::user()->id
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
        $fechaF = $request->fecha_final;
        $estado = (is_null($fechaF)) ?  : $estadoDocumento = 3 ;

        $registroDocumento->update($request->all()+[
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
        registro_documento::update(['id' => $request->id],
            ['fecha_final' => $request->fecha_final, 'id_estado_documento' => $request->id_estado_documento]);

        return response()->json(['success'=>'Post saved successfully.']);
    }
}
