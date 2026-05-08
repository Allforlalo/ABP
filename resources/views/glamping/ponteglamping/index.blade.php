@extends('glamping.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Ponteglamping</h2>
        <a href="{{ route('ponteglamping.create') }}" class="btn btn-primary">Nuevo Registro</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>Glamping</th>
                <th>Venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ponteglamping as $item)
            <tr>
                <td>{{ $item->glamping }}</td>
                <td>{{ $item->id_venta }}</td>
                <td>
                    <a href="{{ route('ponteglamping.edit', $item->glamping) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('ponteglamping.destroy', $item->glamping) }}" method="POST" style="display:inline">
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
