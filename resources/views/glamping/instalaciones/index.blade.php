@extends('glamping.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Instalaciones</h2>
        <a href="{{ route('instalaciones.create') }}" class="btn btn-primary">Nueva Instalación</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instalaciones as $instalacion)
            <tr>
                <td>{{ $instalacion->nombre }}</td>
                <td>
                    <a href="{{ route('instalaciones.edit', $instalacion->id_instalacion) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form novalidate action="{{ route('instalaciones.destroy', $instalacion->id_instalacion) }}" method="POST" style="display:inline">
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
