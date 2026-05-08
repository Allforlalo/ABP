@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Explora Nuestro <span class="text-warning">Menú Cultural</span></h2>
        <p class="text-muted">Gastronomía local, tradición y sabor en cada platillo</p>
    </div>

    @forelse($productos as $categoria => $items)
    <div class="mb-5">
        <h4 class="fw-bold text-center border-bottom border-warning border-2 pb-2 mb-4">{{ $categoria }}</h4>
        <div class="row g-4 justify-content-center">
            @foreach($items as $producto)
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('img/' . \Illuminate\Support\Str::slug($producto->nombre) . '.jpg') }}"
                         class="card-img-top object-fit-cover"
                         style="height: 160px;"
                         onerror="this.style.display='none'">
                    <div class="card-body text-center">
                        <h6 class="fw-bold mb-1">{{ $producto->nombre }}</h6>
                        <p class="text-success fw-bold mb-2">${{ number_format($producto->precio, 2) }}</p>
                        <button class="btn btn-warning btn-sm fw-bold w-100">Agregar</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @empty
    <p class="text-center text-muted">No hay productos disponibles por el momento.</p>
    @endforelse
</div>
@endsection
