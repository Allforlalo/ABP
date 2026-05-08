@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Registrar Detalle de Pedido</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('detalles_pedido.store') }}" method="POST">
                        @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        <div class="mb-3">
                            <label for="id_pedido" class="form-label">Pedido</label>
                            <select class="form-select" id="id_pedido" name="id_pedido">
                                <option value="">Seleccionar pedido</option>
                                @foreach($pedidos as $pedido)
                                    <option value="{{ $pedido->id_pedido }}" {{ old('id_pedido') == $pedido->id_pedido ? 'selected' : '' }}>
                                        #{{ $pedido->id_pedido }} &mdash; {{ $pedido->fecha_hora }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_producto" class="form-label">Producto</label>
                            <select class="form-select" id="id_producto" name="id_producto">
                                <option value="">Seleccionar producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id_producto }}" {{ old('id_producto') == $producto->id_producto ? 'selected' : '' }}>
                                        {{ $producto->nombre }} &mdash; ${{ number_format($producto->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" min="1" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad', 1) }}">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('detalles_pedido.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
