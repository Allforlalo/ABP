@extends('layouts.glamping')

@section('content')
<h2 class="border-bottom border-success border-2 pb-2 mb-4">Empleado</h2>
<div class="card shadow-sm border-0 p-4" style="max-width:500px;">
    <p><strong>ID:</strong> {{ $empleado->id_empleado }}</p>
    <p><strong>ID Persona:</strong> {{ $empleado->id_persona }}</p>
    <p><strong>ID Cargo:</strong> {{ $empleado->id_cargo }}</p>
    <p><strong>ID Horario:</strong> {{ $empleado->id_horario }}</p>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="btn btn-warning fw-bold">Editar</a>
</div>
@endsection
