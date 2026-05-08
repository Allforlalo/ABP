@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Editar Pedido de Platillo</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('pedidos_platillos.update', $pedidoPlatillo->id_pedido_platillo) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $pedidoPlatillo->nombre }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio" class="form-control" value="{{ $pedidoPlatillo->precio }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Venta</label>
                    <select name="id_venta" class="form-select">
                        @foreach($ventas as $venta)
                            <option value="{{ $venta->id_venta }}" {{ $pedidoPlatillo->id_venta == $venta->id_venta ? 'selected' : '' }}>
                                {{ $venta->id_venta }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('pedidos_platillos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
