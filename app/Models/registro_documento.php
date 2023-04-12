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
        'observacion',
        'id_tipo_documento',
        'id_unidad_destino',
        'id_estado_documento', 'estado'
    ];

    public function tipo_documento(){
        return $this->belongsTo(tipo_documento::class, 'id_tipo_documento');
    }

    public function unidad_destino(){
        return $this->belongsTo(unidad::class,'id_unidad_destino');
    }

    public function id_estado_documento(){
        return $this->belongsTo(estado_documento::class, 'id_estado_documento');
    }

}
