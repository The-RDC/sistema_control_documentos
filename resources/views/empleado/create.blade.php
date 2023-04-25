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
                                @for ($i = 0; $i < 2; $i++)
                                    <div class="card">
                                        <div class="card-header" id="headingOne{{$i+1}}">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$i+1}}" aria-expanded="@php echo $i==0?true:false @endphp" aria-controls="collapseOne">
                                                Empresa: {{$i+1}}
                                            </button>
                                            </h2>
                                        </div>
                                    
                                        <div id="collapseOne{{$i+1}}" class="collapse @php echo $i==0?"show":"" @endphp" aria-labelledby="headingOne{{$i+1}}" data-parent="#accordionEmpresa">
                                            <div class="card-body">
                                                Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
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
