<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_documento extends Model
{
    use HasFactory;
    protected  $fillable = [
        'estado'
    ];

    public function registro_documento(){
        return $this->hasMany(registro_documento::class);
    }

    public function log_estado_docuemnto(){
        return $this->hasMany(log_estado_documento::class);
    }
}