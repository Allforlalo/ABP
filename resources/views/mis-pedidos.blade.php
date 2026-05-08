@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-warning d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        Pedidos de {{ $cliente->nombre }} {{ $cliente->apellido_paterno }}
                    </h4>
                    <a href="{{ route('home') }}" class="btn btn-warning btn-sm fw-bold">Regresar</a>
                </div>
                <div class="card-body p-4">
                    @if($pedidos->isEmpty())
                        <p class="text-center text-muted">Este cliente no tiene pedidos registrados.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedidos as $detalle)
                                    <tr>
                                        <td>{{ $detalle->fecha_hora }}</td>
                                        <td>{{ $detalle->nombre }}</td>
                                        <td>${{ number_format($detalle->precio, 2) }}</td>
                                        <td>{{ $detalle->cantidad }}</td>
                                        <td>${{ number_format($detalle->precio * $detalle->cantidad, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
