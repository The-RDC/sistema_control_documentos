<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoCivil extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "estadoCivil";
    protected $fillable = [
        'estadocivil'
    ];

    public function getEmpleadoGenero(){
        return $this->hasMany(empleado::class);
    }
}
