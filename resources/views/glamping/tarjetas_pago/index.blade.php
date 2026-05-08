@extends('glamping.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tarjetas de Pago</h2>
        <a href="{{ route('tarjetas_pago.create') }}" class="btn btn-primary">Nueva Tarjeta</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarjetas as $tarjeta)
            <tr>
                <td>{{ $tarjeta->nombre }}</td>
                <td>{{ $tarjeta->tipo }}</td>
                <td>
                    <a href="{{ route('tarjetas_pago.edit', $tarjeta->id_tarjeta) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tarjetas_pago.destroy', $tarjeta->id_tarjeta) }}" method="POST" style="display:inline">
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
