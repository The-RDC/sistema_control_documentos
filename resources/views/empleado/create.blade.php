@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear Empleado</h1>
                            </div>
                            <form method="POST" action="{{ route('empleado.store') }}">
                                @csrf
                                @include('empleado._form')
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4" style="margin-top: 100px;">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Seleccione la Empresa y Sucursal del Empleado</h1>
                        </div>
                        
                            <div class="accordion" id="accordionEmpresa">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Empresa:
                                        </button>
                                        </h2>
                                    </div>
                                
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionEmpresa">
                                        <div class="card-body">
                                        Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                                        </div>
                                    </div>
                                </div>
                                @for ($i = 0; $i < 5; $i++)
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo{{$i+2}}" aria-expanded="false" aria-controls="collapseTwo{{$i+2}}">
                                          Collapsible Group Item #2
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseTwo{{$i+2}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                      <div class="card-body">
                                        Some placeholder content for the second accordion panel. This panel is hidden by default.
                                      </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
