@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Editar Pedido</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST">
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
                            <label for="id_cliente" class="form-label">Cliente</label>
                            <select class="form-select" id="id_cliente" name="id_cliente">
                                <option value="">Seleccionar cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente', $pedido->id_cliente) == $cliente->id_cliente ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido_paterno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_empleado" class="form-label">Empleado</label>
                            <select class="form-select" id="id_empleado" name="id_empleado">
                                <option value="">Seleccionar empleado</option>
                                @foreach($empleados as $empleado)
                                    <option value="{{ $empleado->id_empleado }}" {{ old('id_empleado', $pedido->id_empleado) == $empleado->id_empleado ? 'selected' : '' }}>
                                        {{ $empleado->nombre }} {{ $empleado->apellido_paterno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" value="{{ old('fecha_hora', $pedido->fecha_hora) }}">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
