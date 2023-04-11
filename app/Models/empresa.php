<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    public $table = "empresas";
    use HasFactory;
    protected $fillable = [
        'nombre_empresa', 'estado'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }
}
