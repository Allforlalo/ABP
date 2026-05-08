@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Nuestras <span class="text-warning">Instalaciones</span></h2>
        <p class="text-muted">Conoce todo lo que tenemos para hacer tu visita inolvidable</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm border-top border-warning border-3">
                <img src="{{ asset('img/gam1.jpg') }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="Instalación 1">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm border-top border-warning border-3">
                <img src="{{ asset('img/gam2.jpg') }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="Instalación 2">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm border-top border-warning border-3">
                <img src="{{ asset('img/gam3.jpg') }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="Instalación 3">
            </div>
        </div>
    </div>

    <h4 class="fw-bold text-center mb-4">Nuestros Servicios</h4>
    <div class="row g-4">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 border-top border-warning border-3 text-center">
                <div class="card-body py-4">
                    <h5 class="fw-bold">Servicios</h5>
                    <p class="text-muted small">Descripcion</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 border-top border-warning border-3 text-center">
                <div class="card-body py-4">
                    <h5 class="fw-bold">Servicios</h5>
                    <p class="text-muted small">Descripcion</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 border-top border-warning border-3 text-center">
                <div class="card-body py-4">
                    <h5 class="fw-bold">Servicios</h5>
                    <p class="text-muted small">Descripcion</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 border-top border-warning border-3 text-center">
                <div class="card-body py-4">
                    <h5 class="fw-bold">Servicios</h5>
                    <p class="text-muted small">Descripcion</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
