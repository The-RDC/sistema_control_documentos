@extends('dashboard-admin.admin')
@section('informacion')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear Estado del Documento</h1>
                            </div>
                            <form method="POST" action="{{ route('estadoDocumento.store') }}">
                                @csrf
                                @include('estado_documento._form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
