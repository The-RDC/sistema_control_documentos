<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalle_empresa_sucursales extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = "detalle_empresa_sucursales";
    protected $fillable = [
      'id_empresa', 'id_sucursal', 'estado'
    ];

    public function empresa(){
        return $this->belongsTo(empresa::class,'id_empresa');
    }

    public function sucursal(){
        return $this->belongsTo(sucursal::class,'id_sucursal');
    }
}
