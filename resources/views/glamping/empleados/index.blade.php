@extends('glamping.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Empleados</h2>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">Nuevo Empleado</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Cargo</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->id_cargo }}</td>
                <td>{{ $empleado->id_horario }}</td>
                <td>
                    <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
