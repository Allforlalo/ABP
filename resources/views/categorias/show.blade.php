@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Categoría</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $categoria->id_categoria }}</p>
    <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
