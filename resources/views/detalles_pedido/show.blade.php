@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Detalle de pedido</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $detalle->id_detalle }}</p>
    <p><strong>ID Pedido:</strong> {{ $detalle->id_pedido }}</p>
    <p><strong>ID Producto:</strong> {{ $detalle->id_producto }}</p>
    <p><strong>Cantidad:</strong> {{ $detalle->cantidad }}</p>
    <a href="{{ route('detalles_pedido.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('detalles_pedido.edit', $detalle->id_detalle) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
