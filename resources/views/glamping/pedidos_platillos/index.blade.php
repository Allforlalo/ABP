@extends('glamping.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pedidos de Platillos</h2>
        <a href="{{ route('pedidos_platillos.create') }}" class="btn btn-primary">Nuevo Pedido</a>
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
            @foreach($pedidosPlatillos as $pedidoPlatillo)
            <tr>
                <td>{{ $pedidoPlatillo->nombre }}</td>
                <td>{{ $pedidoPlatillo->precio }}</td>
                <td>{{ $pedidoPlatillo->id_venta }}</td>
                <td>
                    <a href="{{ route('pedidos_platillos.edit', $pedidoPlatillo->id_pedido_platillo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form novalidate action="{{ route('pedidos_platillos.destroy', $pedidoPlatillo->id_pedido_platillo) }}" method="POST" style="display:inline">
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
