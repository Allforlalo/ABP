@extends('glamping.layout')

@section('content')
    <h2>Detalle de Pedido de Platillo</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $pedidoPlatillo->nombre }}</p>
            <p><strong>Precio:</strong> {{ $pedidoPlatillo->precio }}</p>
            <p><strong>Venta:</strong> {{ $pedidoPlatillo->id_venta }}</p>
        </div>
    </div>
    <a href="{{ route('pedidos_platillos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
