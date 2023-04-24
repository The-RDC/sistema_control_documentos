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
        'direccion_sucursal'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }
}
