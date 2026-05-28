@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-warning">
                    <h4 class="mb-0">Punto de Venta</h4>
                </div>
                <div class="card-body p-4">
                    @if($filas->isEmpty())
                        <div class="alert alert-info">No hay pedidos registrados aún.</div>
                    @else
                        @foreach($filas as $id_cliente => $items)
                        <div class="mb-4">
                            <h6 class="fw-bold text-dark border-bottom pb-1">
                                {{ $items->first()->nombre }} {{ $items->first()->apellido_paterno }}
                            </h6>
                            <table class="table table-sm table-hover table-striped align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->producto }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>${{ number_format($item->precio_total, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
