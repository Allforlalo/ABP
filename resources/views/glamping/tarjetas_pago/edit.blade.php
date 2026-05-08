@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Editar Tarjeta de Pago</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('tarjetas_pago.update', $tarjeta->id_tarjeta) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $tarjeta->nombre }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <input type="text" name="tipo" class="form-control" value="{{ $tarjeta->tipo }}">
                </div>
                <a href="{{ route('tarjetas_pago.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
