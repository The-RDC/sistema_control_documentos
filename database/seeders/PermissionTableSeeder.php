<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'cargo-list',
            'cargo-create',
            'cargo-edit',
            'cargo-delete',

            'empleado-list',
            'empleado-create',
            'empleado-edit',
            'empleado-delete',

            'empresa-list',
            'empresa-create',
            'empresa-edit',
            'empresa-delete',

            'estadoDocumento-list',
            'estadoDocumento-create',
            'estadoDocumento-edit',
            'estadoDocumento-delete',

            'regional-list',
            'regional-create',
            'regional-edit',
            'regional-delete',

            'registroDocumento-list',
            'registroDocumento-create',
            'registroDocumento-edit',
            'registroDocumento-delete',

            'solicitud_vacacion-list',
            'solicitud_vacacion-create',
            'solicitud_vacacion-edit',
            'solicitud_vacacion-delete',

            'sucursal-list',
            'sucursal-create',
            'sucursal-edit',
            'sucursal-delete',

            'tipoDocumento-list',
            'tipoDocumento-create',
            'tipoDocumento-edit',
            'tipoDocumento-delete',

            'unidad-list',
            'unidad-create',
            'unidad-edit',
            'unidad-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
