<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sucursal extends Model
{
    use SoftDeletes;
    public $table = "sucursales";
    use HasFactory;
    protected $fillable = [
        'nombre_sucursal',
        'direccion_sucursal',
        'id_regional',
        'id_empresa'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }

    public function detalle_empresa_sucursales(){
        return $this->hasMany(detalle_empresa_sucursales::class, 'id_sucursal');
    }

    public function destino_usuario()
    {
        return $this->belongsToMany(User::class, 'acceso_usuario_sucursals' ,'id_sucursal','id_usuario');
    }
    
}
