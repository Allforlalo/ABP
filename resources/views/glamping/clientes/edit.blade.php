@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Editar Cliente</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tarjeta</label>
                    <select name="id_tarjeta" class="form-select">
                        @foreach($tarjetas as $tarjeta)
                            <option value="{{ $tarjeta->id_tarjeta }}" {{ $cliente->id_tarjeta == $tarjeta->id_tarjeta ? 'selected' : '' }}>
                                {{ $tarjeta->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
