@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Nuevo Empleado</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form novalidate action="{{ route('empleados.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <select name="id_cargo" class="form-select">
                        @foreach($cargos as $cargo)
                            <option value="{{ $cargo->id_cargo }}">{{ $cargo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Horario</label>
                    <select name="id_horario" class="form-select">
                        @foreach($horarios as $horario)
                            <option value="{{ $horario->id_horario }}">{{ $horario->horario }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
