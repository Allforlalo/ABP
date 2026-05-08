@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Banco</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $banco->id_banco }}</p>
    <p><strong>Nombre:</strong> {{ $banco->nombre }}</p>
    <a href="{{ route('bancos.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('bancos.edit', $banco->id_banco) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
