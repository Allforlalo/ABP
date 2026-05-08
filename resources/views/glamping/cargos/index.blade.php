@extends('glamping.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Cargos</h2>
        <a href="{{ route('cargos.create') }}" class="btn btn-primary">Nuevo Cargo</a>
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
            @foreach($cargos as $cargo)
            <tr>
                <td>{{ $cargo->nombre }}</td>
                <td>
                    <a href="{{ route('cargos.edit', $cargo->id_cargo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cargos.destroy', $cargo->id_cargo) }}" method="POST" style="display:inline">
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
