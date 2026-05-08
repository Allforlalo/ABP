@extends('glamping.layout')

@section('content')
    <h2>Detalle de Horario</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Horario:</strong> {{ $horario->horario }}</p>
        </div>
    </div>
    <a href="{{ route('horarios.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
