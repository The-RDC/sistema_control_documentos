<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empresa extends Model
{
    use SoftDeletes;
    public $table = "empresas";
    use HasFactory;

    protected $fillable = [
        'id_regional',
        'nombre_empresa'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }

    public function detalle_empresa_sucursales(){
        return $this->hasMany(detalle_empresa_sucursales::class, 'id_empresa');
    }

    public function actualizarEstadoDetalleEmpresaSucursal($idEmpresa, $idSucursal) {
       $query = detalle_empresa_sucursales::where('id_empresa', $idEmpresa)
            ->where('id_sucursal', $idSucursal)
            ->where('estado', 1)
            ->update(['estado' => 0]);
//        dump($query);
    }
}
