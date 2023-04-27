<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\empleado;
use App\Policies\EmpleadoPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    use HandlesAuthorization;

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Empleado::class => EmpleadoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        $this->registerPolicies();

        Gate::define('dynamic-policy', function ($user, $permission) {
            $userPermissions = collect();

            foreach ($user->roles as $role) {
                $rolePermissions = $role->permissions()
                    ->join('role_has_permissions as rp', 'permissions.id', '=', 'rp.permission_id')
                    ->where('rp.role_id', $role->id)
                    ->where('rp.estado', 1)
                    ->get();
                $userPermissions = $userPermissions->merge($rolePermissions);
            }
            $userPermissionNames = $userPermissions->pluck('name')->unique();

            return $userPermissionNames->contains($permission);
        });
    }
}
