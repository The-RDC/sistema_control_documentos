<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidad extends Model
{
    use HasFactory;
    protected $fillable = [
        'unidad_area'
    ];

    public function registro_documento(){
        return $this->hasMany(registro_documento::class);
    }

    public function log_estado_docuemnto(){
        return $this->hasMany(log_estado_documento::class);
    }
}
