@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Mis pedidos</h2>
<div class="card shadow-sm border-0">
    <table class="table table-hover mb-0">
        <thead class="table-dark">
            <tr><th>ID</th><th>Fecha y hora</th><th>Empleado</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id_pedido }}</td>
                <td>{{ $pedido->fecha_hora }}</td>
                <td>{{ $pedido->nombre_empleado }} {{ $pedido->ap_empleado }}</td>
                <td>
                    <a href="{{ route('mis_pedidos.show', $pedido->id_pedido) }}" class="btn btn-sm btn-warning">Ver detalle</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center text-muted py-4">No tienes pedidos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
