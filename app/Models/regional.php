<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regional extends Model
{
    public $table = "regionales";
    use HasFactory;
    protected $fillable = [
        'nombre_regional', 'estado'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }
}
