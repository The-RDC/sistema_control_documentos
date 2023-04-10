<form action="{{ route('actualizar') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="hidden" name="id" class="form-control" value="{{ $cargo->id }}">
                <input type="hidden" name="estado" class="form-control" value="1">
                <input type="text" name="nombre_cargo" class="form-control" value="{{ $cargo->nombre_cargo }}" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">guardar</button>
        </div>
    </div>

</form>
