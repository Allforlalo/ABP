@extends('layouts.public')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Mis Pedidos</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('mis_pedidos.cliente') }}" method="GET">
                        <div class="mb-3">
                            <label class="form-label">Selecciona tu nombre</label>
                            <select class="form-select" name="id_cliente" onchange="this.form.submit()">
                                <option value="">— Seleccionar —</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" {{ $seleccionado == $cliente->id_cliente ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido_paterno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    @if($seleccionado)
                        @if($pedidos->isEmpty())
                            <div class="alert alert-info mt-3">Aún no tienes pedidos registrados.</div>
                        @else
                            <table class="table table-hover table-striped align-middle text-center mt-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedidos as $item)
                                    <tr>
                                        <td>{{ $item->producto }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>${{ number_format($item->precio_total, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
