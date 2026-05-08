@extends('glamping.layout')

@section('content')
    <h2>Detalle de Cliente</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
            <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Tarjeta:</strong> {{ $cliente->id_tarjeta }}</p>
        </div>
    </div>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
