<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'nombre_cargo', 'estado'
    ];

    public function getEmpleado(){
        return $this->hasMany(empleado::class);
    }

}
