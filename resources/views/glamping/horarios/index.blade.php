@extends('glamping.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Horarios</h2>
        <a href="{{ route('horarios.create') }}" class="btn btn-primary">Nuevo Horario</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->horario }}</td>
                <td>
                    <a href="{{ route('horarios.edit', $horario->id_horario) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('horarios.destroy', $horario->id_horario) }}" method="POST" style="display:inline">
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
