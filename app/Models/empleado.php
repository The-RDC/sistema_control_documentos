<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    protected $filleable = [
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

    public function cargo(){
        return $this->belongsTo(cargo::class);
    }

    public function sucursal(){
        return $this->belongsTo(sucursal::class);
    }

    public function regional(){
        return $this->belongsTo(regional::class);
    }

    public function empresa(){
        return $this->belongsTo(empresa::class);
    }

    public function solicitud_vacaciones(){
        return $this->hasMany(solicitud_vacacion::class);
    }

    public function log_estado_docuemto(){
        return $this->hasMany(log_estado_documento::class);
    }
}
