<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class regional extends Model
{
    use SoftDeletes;
    public $table = "regionales";
    use HasFactory;
    protected $fillable = [
        'nombre_regional', 'estado'
    ];

    public function empleado(){
        return $this->hasMany(empleado::class);
    }
}
