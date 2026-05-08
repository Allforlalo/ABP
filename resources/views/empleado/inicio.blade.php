@extends('layouts.glamping')

@section('content')
<header class="bg-dark text-white text-center py-5 border-bottom border-warning border-4 rounded mb-5">
    <div class="container py-3">
        <h1 class="display-5 fw-bold">Panel de Empleado</h1>
        <p class="lead text-warning mb-0">Gestión de pedidos — Glamping Valle</p>
    </div>
</header>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 border-top border-warning border-4">
            <div class="card-body text-center">
                <h5 class="fw-bold border-bottom border-success border-2 pb-2 mb-3">Menú</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-dark">Productos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 border-top border-warning border-4">
            <div class="card-body text-center">
                <h5 class="fw-bold border-bottom border-success border-2 pb-2 mb-3">Pedidos</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('pedidos.index') }}" class="btn btn-outline-dark">Ver pedidos</a>
                    <a href="{{ route('pedidos.create') }}" class="btn btn-warning fw-bold">Nuevo pedido</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 border-top border-warning border-4">
            <div class="card-body text-center">
                <h5 class="fw-bold border-bottom border-success border-2 pb-2 mb-3">Detalles</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('detalles_pedido.index') }}" class="btn btn-outline-dark">Ver detalles</a>
                    <a href="{{ route('detalles_pedido.create') }}" class="btn btn-warning fw-bold">Nuevo detalle</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
