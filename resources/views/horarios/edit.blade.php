@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Editar Horario</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('horarios.update', $horario->id_horario) }}" method="POST" class="edit-form">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="hora_entrada" class="form-label">Hora de Entrada</label>
                            <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" value="{{ old('hora_entrada', $horario->hora_entrada) }}">
                        </div>
                        <div class="mb-3">
                            <label for="hora_salida" class="form-label">Hora de Salida</label>
                            <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="{{ old('hora_salida', $horario->hora_salida) }}">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
