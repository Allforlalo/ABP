@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Nueva Tarjeta</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('tarjetas.store') }}" method="POST" class="edit-form">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Persona</label>
                            <select class="form-select" name="id_persona">
                                <option value="">Seleccionar persona</option>
                                @foreach($personas as $persona)
                                    <option value="{{ $persona->id_persona }}" {{ old('id_persona') == $persona->id_persona ? 'selected' : '' }}>
                                        {{ $persona->nombre }} {{ $persona->apellido_paterno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Número de Tarjeta</label>
                            <input type="text" class="form-control" name="numero_tarjeta" pattern="\d{13,19}" minlength="13" maxlength="19" inputmode="numeric" title="Solo dígitos, entre 13 y 19 caracteres" value="{{ old('numero_tarjeta') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de Tarjeta</label>
                            <select class="form-select" name="id_tipo">
                                <option value="">Seleccionar tipo</option>
                                @foreach($tiposTarjeta as $tipo)
                                    <option value="{{ $tipo->id_tipo }}" {{ old('id_tipo') == $tipo->id_tipo ? 'selected' : '' }}>
                                        {{ $tipo->tipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Banco</label>
                            <select class="form-select" name="id_banco">
                                <option value="">Seleccionar banco</option>
                                @foreach($bancos as $banco)
                                    <option value="{{ $banco->id_banco }}" {{ old('id_banco') == $banco->id_banco ? 'selected' : '' }}>
                                        {{ $banco->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('tarjetas.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
