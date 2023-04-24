<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\detalle_empresa_sucursales;
use App\Models\empleado;
use App\Models\empresa;
use App\Models\estado_documento;
use App\Models\EstadoCivil;
use App\Models\Genero;
use App\Models\regional;
use App\Models\sucursal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrimerEmpleado extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = ([
            'nombre_cargo' => 'Administrador',
        ]);
        $position = new Cargo($positions);
        $position->save();

        $regional = ([
            'nombre_regional' => 'LP',
        ]);
        $regional = new regional($regional);
        $regional->save();

        $compani = ([
            'nombre_empresa' => 'La Paz',
            'id_regional' => 1,
        ]);
        $companies = new empresa($compani);
        $companies->save();

        $branch = ([
            'nombre_sucursal' => 'La Paz',
        ]);

        $branchs = new sucursal($branch);
        $branchs->save();

        $detailCompanyBranchs = ([
            'id_empresa' => 1,
            'id_sucursal' => 1,
        ]);

        $companies = new detalle_empresa_sucursales($detailCompanyBranchs);
        $companies->save();

        $genero = ([
            'Femenino',
            'Masculino',
            'Otros',
        ]);

        foreach ($genero as $gener) {
            Genero::create(['nombre_genero' => $gener]);
        }

        $estadoCivil = ([
            'Soltero',
            'Casado',
            'Divorciado',
            'Viudo',
        ]);

        foreach ($estadoCivil as $civil) {
            EstadoCivil::create(['estadocivil' => $civil]);
        }

        $employee = [
            'nombres' => 'Administrador',
            'ap_paterno' => 'Administrador',
            'ap_materno' => 'Administrador',

            'id_empresa' => 1,
            'id_cargo' => 1,
            'nacionalidad' => 'boliviana',
            'nro_documento' => '111111111',
            'tipo_documento' => 'ci',
            'ext_visa_laboral' => '1212121',
            'fecha_nacimiento' => '1999-01-01',
            'id_genero' => 2,
            'id_estadocivil' => 1,
            'telf_celular' => '1212121',

        ];
        $employees = new empleado($employee);
        $employees->save();

        $estadoDocuemnto = ([
            'Recepcionado',
            'Entregado',
            'Finalizado',
        ]);

        foreach ($estadoDocuemnto as $estado) {
            estado_documento::create(['estado_documento' => $estado]);
        }
    }
}
