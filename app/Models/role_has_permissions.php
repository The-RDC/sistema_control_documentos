<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class role_has_permissions extends Model
{
    use HasFactory;

    protected $fillable = [
      'permission_id',
        'role_id',
        'estado'
    ];

    public function role(){
        return $this->belongsTo(Role::class,'id_empresa');
    }

    public function getPermissionsEnabled()
    {
        return $this->belongsToMany(Permission::class)
            ->withPivot('estado')
            ->wherePivot('estado', 1);
    }
}
