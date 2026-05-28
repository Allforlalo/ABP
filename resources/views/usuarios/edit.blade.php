@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Editar Cuenta</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="edit-form">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->name) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo" class="form-control" value="{{ old('correo', $usuario->email) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nueva contraseña <span class="text-muted small">(dejar vacío para no cambiar)</span></label>
                            <input type="password" name="contrasena" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" name="contrasena_confirmation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Usuario</label>
                            <select name="usuario" class="form-select">
                                <option value="administrador" {{ old('usuario', $usuario->usuario) == 'administrador' ? 'selected' : '' }}>Administrador</option>
                                <option value="empleado" {{ old('usuario', $usuario->usuario) == 'empleado' ? 'selected' : '' }}>Empleado</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
