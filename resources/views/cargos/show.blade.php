@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Cargo</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $cargo->id_cargo }}</p>
    <p><strong>Nombre:</strong> {{ $cargo->nombre }}</p>
    <a href="{{ route('cargos.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('cargos.edit', $cargo->id_cargo) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
