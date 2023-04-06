<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_sucursal'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }
}
