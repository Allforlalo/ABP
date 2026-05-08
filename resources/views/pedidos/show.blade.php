@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Pedido</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $pedido->id_pedido }}</p>
    <p><strong>ID Cliente:</strong> {{ $pedido->id_cliente }}</p>
    <p><strong>ID Empleado:</strong> {{ $pedido->id_empleado }}</p>
    <p><strong>Fecha y hora:</strong> {{ $pedido->fecha_hora }}</p>
    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
