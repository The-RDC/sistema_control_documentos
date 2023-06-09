@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear Empleado</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('empleado.store') }}">
                            @csrf
                            @include('empleado._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
