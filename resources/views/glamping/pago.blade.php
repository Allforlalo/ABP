@extends('glamping.layout')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3 class="mb-3">Información de Pago</h3>
        <div class="card p-3">
            <form action="{{ route('ventas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nombre completo" name="nombre">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Teléfono" name="telefono">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de Tarjeta</label>
                    <select class="form-select" name="id_tarjeta">
                        @foreach($tarjetas as $tarjeta)
                            <option value="{{ $tarjeta->id_tarjeta }}">{{ $tarjeta->nombre }} - {{ $tarjeta->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Número de Tarjeta">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="MM/AA">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="CVV">
                    </div>
                </div>
                <button class="btn btn-warning w-100">Pagar</button>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Tu Pedido</h5>
            <small class="text-muted">Desglose de costos transparente</small>
            <hr>
            <p>Subtotal: <span class="float-end">$00.00</span></p>
            <p>IVA (16%): <span class="float-end">$00.00</span></p>
            <p>Envío a Domo: <span class="float-end">$0.00</span></p>
            <hr>
            <h5 class="text-success">Total a Pagar: <span class="float-end">$00.00</span></h5>
        </div>
    </div>
</div>
@endsection
