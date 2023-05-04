<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'password',
        'empleado_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getEmpleado()
    {
        return $this->belongsTo(empleado::class, 'empleado_id');
    }

    public function empleado()
    {
        return $this->hasOne(empleado::class, 'empleado_id');
    }

    public function getSucursalUser()
    {
        return $this->empleado->belongsTo(sucursal::class);
    }

    public function destino_sucursal()
    {
        return $this->belongsToMany(sucursal::class, 'acceso_usuario_sucursals' , 'id_usuario', 'id_sucursal');
    }

    public function actualizarRolePermission($permissionId, $roleId) {
        $query = role_has_permissions::where('permission_id', $permissionId)
            ->where('role_id', $roleId)
            ->where('estado', 1)
//            ->delete();
            ->update(['estado' => 0]);
//        dump($query);
    }
}
