@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Editar Instalación</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form novalidate action="{{ route('instalaciones.update', $instalacion->id_instalacion) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $instalacion->nombre }}">
                </div>
                <a href="{{ route('instalaciones.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
