@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Nueva Cuenta</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo" class="form-control" value="{{ old('correo') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmar contraseña</label>
                            <input type="password" name="contrasena_confirmation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Usuario</label>
                            <select name="usuario" class="form-select">
                                <option value="">Seleccionar usuario</option>
                                <option value="administrador" {{ old('usuario') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                                <option value="empleado" {{ old('usuario') == 'empleado' ? 'selected' : '' }}>Empleado</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
