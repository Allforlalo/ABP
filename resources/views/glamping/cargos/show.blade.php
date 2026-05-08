@extends('glamping.layout')

@section('content')
    <h2>Detalle de Cargo</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $cargo->nombre }}</p>
        </div>
    </div>
    <a href="{{ route('cargos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
