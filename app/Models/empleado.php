<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'genero',
        'estado_civil',
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

    public function getRegional(){
        return $this->belongsTo(regional::class, 'id_regional');
    }

    public function getEmpresa(){
        return $this->belongsTo(empresa::class,'id_empresa');
    }

    public function getSolicitud_vacaciones(){
        return $this->hasMany(solicitud_vacacion::class);
    }

    public function log_estado_docuemto(){
        return $this->hasMany(log_estado_documento::class);
    }
}
