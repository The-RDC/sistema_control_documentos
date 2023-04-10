<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;
    protected $filleable = [
        'empresa', 'estado'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }
}
