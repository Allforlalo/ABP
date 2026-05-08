@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Tarjeta</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $tarjeta->id_tarjeta }}</p>
    <p><strong>Número:</strong> {{ $tarjeta->numero_tarjeta }}</p>
    <p><strong>ID Persona:</strong> {{ $tarjeta->id_persona }}</p>
    <p><strong>ID Tipo:</strong> {{ $tarjeta->id_tipo }}</p>
    <p><strong>ID Banco:</strong> {{ $tarjeta->id_banco }}</p>
    <a href="{{ route('tarjetas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('tarjetas.edit', $tarjeta->id_tarjeta) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
