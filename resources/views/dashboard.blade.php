@extends('layouts.glamping')

@section('content')
<header class="bg-dark text-white text-center py-5 border-bottom border-warning border-4 rounded mb-5">
    <div class="container py-3">
        <h1 class="display-5 fw-bold">Bienvenido, {{ auth()->user()->name }}</h1>
        <p class="lead text-warning mb-0">Sistema de administración — Glamping Valle, San Antonio 103, Valle de Bravo.</p>
    </div>
</header>

@if(auth()->user()->usuario === 'administrador')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 border-top border-warning border-4">
            <div class="card-body text-center">
                <h5 class="fw-bold border-bottom border-success border-2 pb-2 mb-3">Catálogos</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('bancos.index') }}" class="btn btn-outline-dark">Bancos</a>
                    <a href="{{ route('cargos.index') }}" class="btn btn-outline-dark">Cargos</a>
                    <a href="{{ route('categorias.index') }}" class="btn btn-outline-dark">Categorías</a>
                    <a href="{{ route('tipos_tarjeta.index') }}" class="btn btn-outline-dark">Tipos de tarjeta</a>
                    <a href="{{ route('horarios.index') }}" class="btn btn-outline-dark">Horarios</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 border-top border-warning border-4">
            <div class="card-body text-center">
                <h5 class="fw-bold border-bottom border-success border-2 pb-2 mb-3">Personas</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('personas.index') }}" class="btn btn-outline-dark">Personas</a>
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark">Clientes</a>
                    <a href="{{ route('empleados.index') }}" class="btn btn-outline-dark">Empleados</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 border-top border-warning border-4">
            <div class="card-body text-center">
                <h5 class="fw-bold border-bottom border-success border-2 pb-2 mb-3">Operaciones</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-dark">Productos</a>
                    <a href="{{ route('pedidos.index') }}" class="btn btn-outline-dark">Pedidos</a>
                    <a href="{{ route('detalles_pedido.index') }}" class="btn btn-outline-dark">Detalles de pedido</a>
                    <a href="{{ route('tarjetas.index') }}" class="btn btn-outline-dark">Tarjetas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row g-4 justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 h-100 border-top border-warning border-4">
            <div class="card-body text-center">
                <h5 class="fw-bold border-bottom border-success border-2 pb-2 mb-3">Operaciones</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark">Clientes</a>
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-dark">Productos</a>
                    <a href="{{ route('pedidos.index') }}" class="btn btn-outline-dark">Pedidos</a>
                    <a href="{{ route('detalles_pedido.index') }}" class="btn btn-outline-dark">Detalles de pedido</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
