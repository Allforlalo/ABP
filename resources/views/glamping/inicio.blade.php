@extends('glamping.layout')

@section('content')
<header class="bg-dark text-white text-center py-5 border-bottom border-success border-4">
    <div class="container py-4">
        <h1 class="display-5 fw-bold">Sabores de Valle directo a tu Domo</h1>
        <p class="lead text-warning mb-4">Precios competitivos y gran variedad cultural a un clic de distancia.</p>
        <a href="{{ route('glamping.menu') }}" class="btn btn-warning btn-lg fw-bold px-4">Hacer Pedido</a>
    </div>
</header>
<main class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <h2 class="border-bottom border-success border-2 pb-2 mb-4">Menú Cultural</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                @foreach($platillos->take(3) as $platillo)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded-top" style="height: 160px;">Imagen</div>
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $platillo->nombre }}</h5>
                            <h4 class="text-success fw-bold mt-auto mb-3">${{ $platillo->precio }}</h4>
                            <button class="btn btn-dark w-100">+ Agregar</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 border-top border-warning border-4 sticky-top" style="top: 20px;">
                <div class="card-body">
                    <h3 class="card-title h5 fw-bold">Tu Pedido</h3>
                    <p class="text-muted small mb-4"></p>
                    <div class="border-top border-dark border-2 pt-3 mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal:</span>
                            <span>$00.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">IVA (16%):</span>
                            <span>$00.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Envío a Domo:</span>
                            <span>$0.00</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bold text-success fs-5 mt-3">
                            <span>Total a Pagar:</span>
                            <span>$00.00</span>
                        </div>
                    </div>
                    <a href="{{ route('glamping.pago') }}" class="btn btn-warning w-100 fw-bold mt-4 py-2">Confirmar Pedido</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
