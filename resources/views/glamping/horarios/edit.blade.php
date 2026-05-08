@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Editar Horario</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('horarios.update', $horario->id_horario) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Horario</label>
                    <input type="time" name="horario" class="form-control" value="{{ $horario->horario }}">
                </div>
                <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
