@extends('layouts.glamping')

@section('content')
<header class="bg-dark text-white text-center py-5 border-bottom border-warning border-4 rounded mb-5">
    <div class="container py-3">
        <h1 class="display-5 fw-bold">
            @auth
                Bienvenido, {{ Auth::user()->name }}
            @else
                Bienvenido a PonteGlamping
            @endauth
        </h1>
        <p class="lead text-warning mb-0">Glamping Valle — San Antonio 103, Valle de Bravo</p>
    </div>
</header>

@auth
    @if(auth()->user()->id_rol == 3)
    <div class="row g-4 justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100 border-top border-warning border-4">
                <div class="card-body text-center">
                    <h5 class="fw-bold border-bottom border-success border-2 pb-2 mb-3">Mis pedidos</h5>
                    <p class="text-muted small">Consulta el historial y detalle de tus pedidos.</p>
                    <a href="{{ route('mis_pedidos.index') }}" class="btn btn-warning fw-bold w-100">Ver mis pedidos</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@else
<div class="row g-4 justify-content-center">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
            <div class="mb-3 fs-1">🏕️</div>
            <h5 class="fw-bold">Glamping Deluxe</h5>
            <p class="text-muted">Carpas equipadas con cama king size, baño privado y vista panorámica al bosque.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
            <div class="mb-3 fs-1">🍽️</div>
            <h5 class="fw-bold">Restaurante</h5>
            <p class="text-muted">Menú gourmet preparado con ingredientes locales y frescos.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
            <div class="mb-3 fs-1">🌲</div>
            <h5 class="fw-bold">Actividades</h5>
            <p class="text-muted">Senderismo, kayak, tirolesa y fogatas nocturnas en plena naturaleza.</p>
        </div>
    </div>
</div>
@endauth
@endsection
