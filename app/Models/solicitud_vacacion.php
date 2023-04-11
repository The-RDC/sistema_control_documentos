<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitud_vacacion extends Model
{
    public $table = "solicitud_vacaciones";
    use HasFactory;
    protected $fillable = [
        'id_empleado',
        'fecha_solicitud',
        'fecha_salida',
        'fecha_retorno',
        'aprobacion',
        'observacion', 'estado'
    ];

    public function empleado(){
        return $this->belongsTo(empleado::class);
    }
}
