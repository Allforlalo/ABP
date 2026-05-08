@extends('glamping.layout')

@section('content')
    <h2>Detalle de Venta</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Cliente:</strong> {{ $venta->id_cliente }}</p>
            <p><strong>Empleado:</strong> {{ $venta->id_empleado }}</p>
        </div>
    </div>
    <a href="{{ route('ventas.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
