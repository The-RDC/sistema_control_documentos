<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissions): Response
    {
        $user = auth()->user();
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

        $permissionss = is_array($permissions)
            ? $permissions
            : explode('|', $permissions);

//        print_r($permissionss);
//        print_r($userPermissionNames);
        foreach ($permissionss as $permission) {
            if (!$userPermissionNames->contains($permission)) {
                abort(403, 'No tiene permisos para acceder a esta página');
            }
        }
        return $next($request);
    }
}
