<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\detalle_empleado_empresa;
use App\Models\detalle_empleado_sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cargo;

class empleado extends Model
{
    use SoftDeletes;     use HasFactory;

    public $table = "empleados";
    protected $fillable = [
        'id_regional',
        'id_sucursal',
        'id_empresa',
        'id_cargo',
        'nombres',
        'ap_paterno',
        'ap_materno',
        'avatar',
        'nacionalidad',
        'nro_documento',
        'tipo_documento',
        'ext_visa_laboral',
        'email_personal',
        'email_institucional',
        'fecha_nacimiento',
        'id_genero',
        'id_estadocivil',
        'telf_celular',
        'telf_fijo',
        'direccion',
        'estado_registro',
        'estado',
        'nom_sis',
        'num_suc'
    ];

    public function getCargo(){
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }

    public function getSucursal(){
        return $this->belongsTo(sucursal::class, 'id_sucursal');
    }

    public function usuarios()
    {
        return $this->hasMany('App\User');
    }

    public function getRegional(){
        return $this->belongsTo(regional::class, 'id_regional');
    }

    public function getEmpresa(){
        return $this->belongsTo(empresa::class,'id_empresa');
    }

    public function getGenero(){
        return $this->belongsTo(Genero::class,'id_genero');
    }

    public function getEstadoCivil(){
        return $this->belongsTo(EstadoCivil::class,'id_estadocivil');
    }

    public function getSolicitud_vacaciones(){
        return $this->hasMany(solicitud_vacacion::class);
    }

    public function log_estado_docuemto(){
        return $this->hasMany(log_estado_documento::class);
    }



    public function detalle_empleado_sucursales(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(detalle_empleado_sucursal::class, 'id_empleado');
    }

    public function detalle_empleado_empresas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(detalle_empleado_empresa::class, 'id_empleado');
    }

    public function actualizarEstadoDetalleEmpleadoSucursal($idEmpleado, $idSucursal) {
        $query = detalle_empleado_sucursal::where('id_empleado', $idEmpleado)
             ->where('id_sucursal', $idSucursal)
             ->where('estado', 1)
             ->update(['estado' => 0]);
     }


}
