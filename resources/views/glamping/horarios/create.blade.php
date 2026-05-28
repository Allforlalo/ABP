@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Nuevo Horario</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form novalidate action="{{ route('horarios.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Horario</label>
                    <input type="time" name="horario" class="form-control">
                </div>
                <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
