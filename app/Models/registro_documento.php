<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class registro_documento extends Model
{
    use SoftDeletes;
    public $table = "registro_documentos";
    use HasFactory;
    protected $fillable = [
        'numero_hoja_ruta',
        'fecha_recepcion',
        'fecha_entrega',
        'fecha_final',
        //'empresa',
        //'regional',
        'id_sucursal',
        'observacion',
        'id_usuario',
        'id_tipo_documento',
        'id_unidad_destino',
        'id_estado_documento', 'estado'
    ];

    public function getUserRegister(){
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function getTipoDocumento(){
        return $this->belongsTo(tipo_documento::class, 'id_tipo_documento');
    }

    public function getUnidadDestino(){
        return $this->belongsTo(unidad::class,'id_unidad_destino');
    }

    public function getEstadoDocumento(){
        return $this->belongsTo(estado_documento::class, 'id_estado_documento');
    }

    public static function getVistasDocumento($request){
        $registroDocumento = registro_documento::get();
        $emp = $request->input('empresa');
        $reg = $request->input('regional');
        $suc = $request->input('sucursal');
        $est = $request->input('estado');

        $data = registro_documento::when($emp, function ($query) use ($emp) {
            return $query->where('empresa', $emp);
        })
            ->when($reg, function ($query) use ($reg) {
                return $query->where('regional', $reg);
            })
            ->when($suc, function ($query) use ($suc) {
                return $query->where('sucursal', $suc);
            })
            ->when($est, function ($query) use ($est) {
                return $query->where('id_estado_documento', $est);
            })
            ->get();

            return $data;
    }
}
