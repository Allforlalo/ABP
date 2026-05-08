@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Producto</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $producto->id_producto }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Precio:</strong> <span class="text-success fw-bold">${{ number_format($producto->precio, 2) }}</span></p>
    <p><strong>ID Categoría:</strong> {{ $producto->id_categoria }}</p>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
