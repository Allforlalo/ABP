@extends('glamping.layout')

@section('content')
    <h2>Detalle de Instalación</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $instalacion->nombre }}</p>
        </div>
    </div>
    <a href="{{ route('instalaciones.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
