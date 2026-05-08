@extends('glamping.layout')

@section('content')
    <h2>Detalle Ponteglamping</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <p><strong>Glamping:</strong> {{ $ponteglamping->glamping }}</p>
            <p><strong>Venta:</strong> {{ $ponteglamping->id_venta }}</p>
        </div>
    </div>
    <a href="{{ route('ponteglamping.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
