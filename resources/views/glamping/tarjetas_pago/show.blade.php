@extends('glamping.layout')

@section('content')
    <h2>Detalle de Tarjeta de Pago</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $tarjeta->nombre }}</p>
            <p><strong>Tipo:</strong> {{ $tarjeta->tipo }}</p>
        </div>
    </div>
    <a href="{{ route('tarjetas_pago.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
