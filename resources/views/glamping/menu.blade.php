@extends('glamping.layout')

@section('content')
<header class="bg-dark text-white text-center py-5 border-bottom border-success border-4">
    <div class="container py-3">
        <h1 class="fw-bold">Explora Nuestro Menú Cultural</h1>
        <p class="text-warning mb-0">Gastronomía local, tradición y sabor en cada platillo.</p>
    </div>
</header>
<section class="container my-5">
    <h2 class="border-bottom border-success border-2 pb-2 mb-4">Categorías</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center h-100">
                <div class="card-body">
                    <h5 class="fw-bold">Platillos</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center h-100">
                <div class="card-body">
                    <h5 class="fw-bold">Cervezas</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center h-100">
                <div class="card-body">
                    <h5 class="fw-bold">Bebidas</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container mb-5">
    <h2 class="border-bottom border-success border-2 pb-2 mb-4">Platillos</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
        @foreach($platillos as $platillo)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('img/ensalada' . $loop->iteration . '.jpg') }}" alt="{{ $platillo->nombre }}" class="rounded-top w-100" style="height:160px; object-fit:cover;">
                <div class="card-body text-center d-flex flex-column">
                    <h6 class="fw-bold">{{ $platillo->nombre }}</h6>
                    <h5 class="text-success fw-bold mt-auto">${{ $platillo->precio }}</h5>
                    <button class="btn btn-dark w-100 mt-2">Agregar</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section class="container mb-5">
    <h2 class="border-bottom border-success border-2 pb-2 mb-4">Bebidas</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
        @foreach($bebidas as $bebida)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded-top" style="height:160px;">Imagen</div>
                <div class="card-body text-center d-flex flex-column">
                    <h6 class="fw-bold">{{ $bebida->nombre }}</h6>
                    <h5 class="text-success fw-bold mt-auto">${{ $bebida->precio }}</h5>
                    <button class="btn btn-dark w-100 mt-2">Agregar</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
