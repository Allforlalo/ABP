@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Editar Venta</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('ventas.update', $venta->id_venta) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="id_cliente" class="form-select">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}" {{ $venta->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                                {{ $cliente->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Empleado</label>
                    <select name="id_empleado" class="form-select">
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}" {{ $venta->id_empleado == $empleado->id_empleado ? 'selected' : '' }}>
                                {{ $empleado->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
