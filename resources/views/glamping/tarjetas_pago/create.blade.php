@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Nueva Tarjeta de Pago</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form novalidate action="{{ route('tarjetas_pago.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <input type="text" name="tipo" class="form-control">
                </div>
                <a href="{{ route('tarjetas_pago.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
