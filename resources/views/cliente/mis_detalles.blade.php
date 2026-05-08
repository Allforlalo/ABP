@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Detalle del pedido #{{ $pedido->id_pedido }}</h2>
<p class="text-muted mb-4">Fecha: {{ $pedido->fecha_hora }}</p>

<div class="card shadow-sm border-0 mb-4">
    <table class="table table-hover mb-0">
        <thead class="table-dark">
            <tr><th>Producto</th><th>Precio unitario</th><th>Cantidad</th><th>Subtotal</th></tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @forelse($detalles as $detalle)
            @php $subtotal = $detalle->precio * $detalle->cantidad; $total += $subtotal; @endphp
            <tr>
                <td>{{ $detalle->producto }}</td>
                <td class="text-success fw-bold">${{ number_format($detalle->precio, 2) }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>${{ number_format($subtotal, 2) }}</td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center text-muted py-4">Sin productos en este pedido.</td></tr>
            @endforelse
        </tbody>
        <tfoot class="table-light">
            <tr>
                <td colspan="3" class="text-end fw-bold">Total:</td>
                <td class="text-success fw-bold">${{ number_format($total, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</div>

<a href="{{ route('mis_pedidos') }}" class="btn btn-secondary">Volver a mis pedidos</a>
@endsection
