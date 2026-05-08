@extends('glamping.layout')

@section('content')
<header class="bg-dark text-white text-center py-5 border-bottom border-success border-4">
    <div class="container py-3">
        <h1 class="fw-bold">Nuestras Instalaciones</h1>
    </div>
</header>
<section class="container my-5">
    <h2 class="border-bottom border-success border-2 pb-2 mb-4">Instalaciones</h2>
    <div class="row g-4">
        @foreach($instalaciones as $instalacion)
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset('img/gam' . $loop->iteration . '.jpg') }}" alt="Instalación" class="rounded-top w-100" style="height:200px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="fw-bold">{{ $instalacion->nombre }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section class="container mb-5">
    <h2 class="border-bottom border-success border-2 pb-2 mb-4">Servicios Incluidos</h2>
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="fw-bold">Servicio</h6>
                    <p class="text-muted small">Descripcion</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="fw-bold">Servicio</h6>
                    <p class="text-muted small">Descripcion</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="fw-bold">Servicio</h6>
                    <p class="text-muted small">Descripcion</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="fw-bold">Servicio</h6>
                    <p class="text-muted small">Descripcion</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
