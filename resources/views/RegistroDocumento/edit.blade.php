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
                                <h1 class="h4 text-gray-900 mb-4">Editar Documento</h1>
                            </div>
                            <form method="POST" action="{{ route('registroDocumento.update', $registroDocumento) }}">
                                @csrf @method('PATCH')
                                @include('RegistroDocumento._form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
