@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Tipo de tarjeta</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $tipoTarjeta->id_tipo }}</p>
    <p><strong>Tipo:</strong> {{ $tipoTarjeta->tipo }}</p>
    <a href="{{ route('tipos_tarjeta.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('tipos_tarjeta.edit', $tipoTarjeta->id_tipo) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
