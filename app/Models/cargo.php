<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    use HasFactory;
    protected $filleable = [
        'nombre_cargo'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }

}
