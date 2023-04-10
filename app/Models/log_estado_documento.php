<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_estado_documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_log',
        'fecha_recepcion',
        'fecha_entrega',
        'fecha_final',
        'observacion',
        'id_tipo_documento',
        'id_unidad_destino',
        'id_estado_documento',
        'id_empleado', 'estado'
    ];
    public function empleado(){
        return $this->belongsTo(empleado::class);
    }

    public function unidad_destino(){
        return $this->belongsTo(unidad::class);
    }

    public function tipo_documento(){
        return $this->belongsTo(tipo_documento::class);
    }

    public function estado_documento(){
        return $this->belongsTo(estado_documento::class);
    }



}
