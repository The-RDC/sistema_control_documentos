<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_cargo', 'estado'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }

}
