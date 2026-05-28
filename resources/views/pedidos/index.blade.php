@extends('layouts.glamping')

@section('content')
<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-warning d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Pedidos</h4>
                    <a href="{{ route('pedidos.create') }}" class="btn btn-warning fw-bold btn-sm">Nuevo Pedido</a>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Cliente</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Empleado</th>
                                    <th>Fecha y Hora</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->nombre_cliente }} {{ $pedido->ap_cliente }}</td>
                                    <td>{{ $pedido->producto }}</td>
                                    <td>{{ $pedido->cantidad }}</td>
                                    <td>{{ $pedido->nombre_empleado }} {{ $pedido->ap_empleado }}</td>
                                    <td>{{ $pedido->fecha_hora }}</td>
                                    <td>
                                        <a class="btn btn-warning px-3" href="{{ route('pedidos.edit', $pedido->id_pedido) }}">Editar</a>
                                        <form novalidate action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" method="POST" style="display:inline;" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-3">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
