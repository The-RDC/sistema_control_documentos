@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Detalle Empleado!</h1>
                            </div>

                            <table class="table caption-top">
                                <thead>
                                <tr>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">Nombres</th>
                                    <td>{{ $empleado->nombres }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido Paterno</th>
                                    <td>{{ $empleado->ap_paterno }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido Materno</th>
                                    <td>{{ $empleado->ap_materno }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nacionalidad</th>
                                    <td>{{ $empleado->nacionalidad }}</td>
                                </tr>
                                <tr>
                                    <th scope="row"># Documento</th>
                                    <td>{{ $empleado->nro_documento }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tipo Documento</th>
                                    <td>{{ $empleado->tipo_documento }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Visal Laboral</th>
                                    <td>{{ $empleado->ext_visa_laboral }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Correo Personal</th>
                                    <td>{{ $empleado->email_personal }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Correo Coorporativo</th>
                                    <td>{{ $empleado->email_institucional }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fecha Nacimiento</th>
                                    <td>{{ $empleado->fecha_nacimiento }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Genero</th>
                                    <td>{{ $empleado->genero }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Estado Civil</th>
                                    <td>{{ $empleado->estado_civil }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Cargo</th>
                                    <td>{{ $empleado->getCargo->nombre_cargo }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
