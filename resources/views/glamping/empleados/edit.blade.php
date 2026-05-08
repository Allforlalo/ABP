@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Editar Empleado</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $empleado->nombre }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ $empleado->telefono }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <select name="id_cargo" class="form-select">
                        @foreach($cargos as $cargo)
                            <option value="{{ $cargo->id_cargo }}" {{ $empleado->id_cargo == $cargo->id_cargo ? 'selected' : '' }}>
                                {{ $cargo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Horario</label>
                    <select name="id_horario" class="form-select">
                        @foreach($horarios as $horario)
                            <option value="{{ $horario->id_horario }}" {{ $empleado->id_horario == $horario->id_horario ? 'selected' : '' }}>
                                {{ $horario->horario }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
