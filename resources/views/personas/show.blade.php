@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Persona</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:600px;">
    <p><strong>ID:</strong> {{ $persona->id_persona }}</p>
    <p><strong>Nombre:</strong> {{ $persona->nombre }}</p>
    <p><strong>Apellido paterno:</strong> {{ $persona->apellido_paterno }}</p>
    <p><strong>Apellido materno:</strong> {{ $persona->apellido_materno }}</p>
    <p><strong>INE:</strong> {{ $persona->ine }}</p>
    <a href="{{ route('personas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('personas.edit', $persona->id_persona) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
