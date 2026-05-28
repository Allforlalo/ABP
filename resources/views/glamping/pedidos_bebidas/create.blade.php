@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Nuevo Pedido de Bebida</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form novalidate action="{{ route('pedidos_bebidas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Venta</label>
                    <select name="id_venta" class="form-select">
                        @foreach($ventas as $venta)
                            <option value="{{ $venta->id_venta }}">{{ $venta->id_venta }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('pedidos_bebidas.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
