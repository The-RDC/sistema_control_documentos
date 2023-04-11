<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class unidad extends Model
{
    use SoftDeletes;
    public $table = "unidades";
    use HasFactory;
    protected $fillable = [
        'unidad_area', 'estado'
    ];

    public function registro_documento(){
        return $this->hasMany(registro_documento::class);
    }

    public function log_estado_docuemnto(){
        return $this->hasMany(log_estado_documento::class);
    }
}
