@extends('layouts.public')

@section('content')

<header class="bg-dark text-white text-center py-5 border-bottom border-warning border-4">
    <div class="container py-4">
        <h1 class="display-4 fw-bold">Bienvenido a <span class="text-warning">PonteGlamping</span></h1>
        <p class="lead mb-4">Gastronomía local, tradición y sabor en cada platillo — Glamping Valle, Valle de Bravo.</p>
        <a href="#" class="btn btn-warning btn-lg fw-bold">Hacer pedido</a>
    </div>
</header>

@if($clientes->isNotEmpty())
<div class="border-top border-warning border-4">
    <div class="container py-4">
        <h5 class="fw-bold text-center mb-3">Ver mis <span class="text-warning">pedidos</span></h5>
        <form action="{{ route('mis-pedidos') }}" method="GET" class="d-flex justify-content-center gap-2">
            <select name="id_cliente" class="form-select w-auto">
                <option value="">Seleccionar cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-warning fw-bold">Ver pedidos</button>
        </form>
    </div>
</div>
@endif

@if($populares->isNotEmpty())
<div class="container py-5">
    <h3 class="fw-bold text-center mb-4">Platillos más <span class="text-warning">populares</span></h3>
    <div class="row g-4 justify-content-center">
        @foreach($populares as $producto)
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100 border-top border-warning border-3">
                <img src="{{ asset('img/' . \Illuminate\Support\Str::slug($producto->nombre) . '.jpg') }}"
                     class="card-img-top object-fit-cover"
                     style="height: 160px;"
                     onerror="this.style.display='none'">
                <div class="card-body text-center">
                    <h6 class="fw-bold mb-1">{{ $producto->nombre }}</h6>
                    <p class="text-success fw-bold mb-0">${{ number_format($producto->precio, 2) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection
