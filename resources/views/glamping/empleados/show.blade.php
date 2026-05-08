@extends('glamping.layout')

@section('content')
    <h2>Detalle de Empleado</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
            <p><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
            <p><strong>Cargo:</strong> {{ $empleado->id_cargo }}</p>
            <p><strong>Horario:</strong> {{ $empleado->id_horario }}</p>
        </div>
    </div>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
