@extends(auth()->check() ? 'layouts.glamping' : 'layouts.public')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Registrar Detalle de Pedido</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('detalles_pedido.store') }}" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Cliente</label>
                            <select class="form-select" name="id_cliente">
                                <option value="">Seleccionar cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido_paterno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Producto</label>
                            <select class="form-select" name="id_producto">
                                <option value="">Seleccionar producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id_producto }}" {{ old('id_producto') == $producto->id_producto ? 'selected' : '' }}>
                                        {{ $producto->nombre }} &mdash; ${{ number_format($producto->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cantidad</label>
                            <input type="number" min="1" max="999" class="form-control" name="cantidad" value="{{ old('cantidad', 1) }}">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ auth()->check() ? route('detalles_pedido.index') : route('home') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
