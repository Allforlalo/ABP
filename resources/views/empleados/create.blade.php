@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Registrar Empleado</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        <div class="mb-3">
                            <label for="id_persona" class="form-label">Persona</label>
                            <select class="form-select" id="id_persona" name="id_persona">
                                <option value="">Seleccionar persona</option>
                                @foreach($personas as $persona)
                                    <option value="{{ $persona->id_persona }}" {{ old('id_persona') == $persona->id_persona ? 'selected' : '' }}>
                                        {{ $persona->nombre }} {{ $persona->apellido_paterno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_cargo" class="form-label">Cargo</label>
                            <select class="form-select" id="id_cargo" name="id_cargo">
                                <option value="">Seleccionar cargo</option>
                                @foreach($cargos as $cargo)
                                    <option value="{{ $cargo->id_cargo }}" {{ old('id_cargo') == $cargo->id_cargo ? 'selected' : '' }}>
                                        {{ $cargo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_horario" class="form-label">Horario</label>
                            <select class="form-select" id="id_horario" name="id_horario">
                                <option value="">Seleccionar horario</option>
                                @foreach($horarios as $horario)
                                    <option value="{{ $horario->id_horario }}" {{ old('id_horario') == $horario->id_horario ? 'selected' : '' }}>
                                        {{ $horario->hora_entrada }} - {{ $horario->hora_salida }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
