<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\SoftDeletes;

class acceso_usuario_sucursal extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'acceso_usuario_sucursals';
    protected $fillable = [
        'id_usuario',
        'id_sucursal'
    ];

    public function insertarDatosAccesoUsuarioSucursal($id_usuario, $id_sucursal)
    {
        $this->create(['id_usuario'=>$id_usuario, 'id_sucursal'=>$id_sucursal]);
    }

    public function eliminarDatosAccesoUsuarioSucursal($id_registro)
    {
        $this->where('id',$id_registro)->delete();
    }

}
