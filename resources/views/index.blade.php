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
            <tr>
                <td>
                    <label class="checkboxs">
                        {{--                                <input type="checkbox">--}}
                        {{--                                <span class="checkmarks"></span>--}}
                        {{ $cargos->id }}

                    </label>
                </td>
                <td>
                    <a>{{ $cargos->nombre_cargo }}</a>
                </td>

                <td>
                    <form action="{{ route('editar', $cargos) }}" method="post">
                        @csrf @method('DELETE')
                        <a class="me-3" href="{{ route('editar', $cargos) }}">
                            <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                        </a>
                        <button class="btn btn-md btn-light ">
                            <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
