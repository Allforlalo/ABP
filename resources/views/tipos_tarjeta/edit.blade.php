@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Editar Tipo de Tarjeta</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('tipos_tarjeta.update', $tipoTarjeta->id_tipo) }}" method="POST" class="edit-form">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" pattern="[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+" title="Solo letras y espacios" value="{{ old('tipo', $tipoTarjeta->tipo) }}">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('tipos_tarjeta.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
