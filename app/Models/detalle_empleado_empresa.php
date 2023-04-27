<?php

namespace App\Models;

use App\Models\empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalle_empleado_empresa extends Model
{

    use SoftDeletes;
    use HasFactory;
    public $table="detalle_empleado_empresas";
    protected $fillable=[
        'id_empleado',
        'id_empresa',
        'estado'
    ];

    public function empleado(){
        return $this->belongsTo(empleado::class,'id_empleado');
    }
}
