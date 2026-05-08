@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Horario</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $horario->id_horario }}</p>
    <p><strong>Hora de entrada:</strong> {{ $horario->hora_entrada }}</p>
    <p><strong>Hora de salida:</strong> {{ $horario->hora_salida }}</p>
    <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('horarios.edit', $horario->id_horario) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
