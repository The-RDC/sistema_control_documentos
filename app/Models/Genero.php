<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "generos";
    protected $fillable = [
        'nombre_genero'
    ];

    public function getEmpleadoGenero(){
        return $this->hasMany(empleado::class);
    }
}
