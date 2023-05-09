<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class procedenciaDocumento extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = "procedencia_documento";
    protected $fillable = [
        'procedencia'
    ];

    public function estado_docuemto(){
        return $this->hasMany(estado_documento::class);
    }

}
