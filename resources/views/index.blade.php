<div class="table-responsive">
    <table class="table  datanew">
        <thead>
        <tr>
            <th>
                <label class="checkboxs">
                    <input type="checkbox" id="select-all">
                    <span class="checkmarks"></span>
                </label>
            </th>
            <th>id</th>
            <th>cargo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cargo as $cargos)
            @if( $cargos->estado === 1)
                <tr>
                    <td>
                            {{ $cargos->id }}
                    </td>
                    <td>
                        <a>{{ $cargos->nombre_cargo }}</a>
                    </td>

                    <td>
{{--                        <form action="{{ route('eliminar', $cargos->id) }}" method="POST">--}}
{{--                            @csrf--}}
                            <a class="me-3" href="{{ route('editar', $cargos) }}">
                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                            </a>
                            <a class="me-3" href="{{ route('eliminar', $cargos) }}">
                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                            </a>
{{--                            <button class="btn btn-md btn-light ">--}}
{{--                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">--}}
{{--                            </button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
