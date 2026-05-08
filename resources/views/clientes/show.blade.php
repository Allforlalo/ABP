@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Cliente</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $cliente->id_cliente }}</p>
    <p><strong>ID Persona:</strong> {{ $cliente->id_persona }}</p>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
