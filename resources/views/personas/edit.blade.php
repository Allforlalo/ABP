@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Editar Persona</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('personas.update', $persona->id_persona) }}" method="POST" class="edit-form">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $persona->nombre) }}">
                        </div>
                        <div class="mb-3">
                            <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', $persona->apellido_paterno) }}">
                        </div>
                        <div class="mb-3">
                            <label for="apellido_materno" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', $persona->apellido_materno) }}">
                        </div>
                        <div class="mb-3">
                            <label for="ine" class="form-label">INE</label>
                            <input type="text" class="form-control" id="ine" name="ine" pattern="[a-zA-Z0-9]{18}" maxlength="18" title="Exactamente 18 caracteres alfanuméricos" value="{{ old('ine', $persona->ine) }}">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('personas.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
