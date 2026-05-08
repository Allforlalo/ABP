@extends('layouts.glamping')

@section('content')
<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-warning d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Lista de Detalles de Pedido</h4>
                    <a class="btn btn-warning btn-sm fw-bold" href="{{ route('detalles_pedido.create') }}">Nuevo Detalle</a>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Pedido</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detalles as $detalle)
                                <tr>
                                    <td>#{{ $detalle->id_pedido }} &mdash; {{ $detalle->fecha_hora }}</td>
                                    <td>{{ $detalle->producto }}</td>
                                    <td>${{ number_format($detalle->precio, 2) }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>
                                        <a class="btn btn-warning px-3" href="{{ route('detalles_pedido.edit', $detalle->id_detalle) }}">Editar</a>
                                        <form action="{{ route('detalles_pedido.destroy', $detalle->id_detalle) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar?')">
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
