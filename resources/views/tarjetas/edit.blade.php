@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Editar Tarjeta</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('tarjetas.update', $tarjeta->id_tarjeta) }}" method="POST">
                        @csrf
                        @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        <div class="mb-3">
                            <label for="numero_tarjeta" class="form-label">Número de Tarjeta</label>
                            <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" value="{{ old('numero_tarjeta', $tarjeta->numero_tarjeta) }}">
                        </div>
                        <div class="mb-3">
                            <label for="id_persona" class="form-label">Titular</label>
                            <select class="form-select" id="id_persona" name="id_persona">
                                <option value="">Seleccionar persona</option>
                                @foreach($personas as $persona)
                                    <option value="{{ $persona->id_persona }}" {{ old('id_persona', $tarjeta->id_persona) == $persona->id_persona ? 'selected' : '' }}>
                                        {{ $persona->nombre }} {{ $persona->apellido_paterno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_tipo" class="form-label">Tipo de Tarjeta</label>
                            <select class="form-select" id="id_tipo" name="id_tipo">
                                <option value="">Seleccionar tipo</option>
                                @foreach($tiposTarjeta as $tipo)
                                    <option value="{{ $tipo->id_tipo }}" {{ old('id_tipo', $tarjeta->id_tipo) == $tipo->id_tipo ? 'selected' : '' }}>
                                        {{ $tipo->tipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_banco" class="form-label">Banco</label>
                            <select class="form-select" id="id_banco" name="id_banco">
                                <option value="">Seleccionar banco</option>
                                @foreach($bancos as $banco)
                                    <option value="{{ $banco->id_banco }}" {{ old('id_banco', $tarjeta->id_banco) == $banco->id_banco ? 'selected' : '' }}>
                                        {{ $banco->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('tarjetas.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
