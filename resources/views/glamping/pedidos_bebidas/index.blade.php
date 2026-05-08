@extends('glamping.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pedidos de Bebidas</h2>
        <a href="{{ route('pedidos_bebidas.create') }}" class="btn btn-primary">Nuevo Pedido</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidosBebidas as $pedidoBebida)
            <tr>
                <td>{{ $pedidoBebida->nombre }}</td>
                <td>{{ $pedidoBebida->precio }}</td>
                <td>{{ $pedidoBebida->id_venta }}</td>
                <td>
                    <a href="{{ route('pedidos_bebidas.edit', $pedidoBebida->id_pedido_bebida) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pedidos_bebidas.destroy', $pedidoBebida->id_pedido_bebida) }}" method="POST" style="display:inline">
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
