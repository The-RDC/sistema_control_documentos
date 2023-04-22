<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empresa extends Model
{
    use SoftDeletes;
    public $table = "empresas";
    use HasFactory;
    protected $fillable = [
        'nombre_empresa', 
        'estado'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }
}
