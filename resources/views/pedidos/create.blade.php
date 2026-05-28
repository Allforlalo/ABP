@extends('layouts.glamping')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-warning text-center">
                    <h4 class="mb-0">Registrar Pedido</h4>
                </div>
                <div class="card-body p-4">
                    <form novalidate action="{{ route('pedidos.store') }}" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Detalle de Pedido</label>
                            <select class="form-select" name="id_detalle">
                                <option value="">Seleccionar pedido</option>
                                @foreach($detalles as $detalle)
                                    <option value="{{ $detalle->id_detalle }}" {{ old('id_detalle') == $detalle->id_detalle ? 'selected' : '' }}>
                                        #{{ $detalle->id_detalle }} &mdash; {{ $detalle->nombre }} {{ $detalle->apellido_paterno }} &mdash; {{ $detalle->producto }} x{{ $detalle->cantidad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Empleado</label>
                            <select class="form-select" name="id_empleado">
                                <option value="">Seleccionar empleado</option>
                                @foreach($empleados as $empleado)
                                    <option value="{{ $empleado->id_empleado }}" {{ old('id_empleado') == $empleado->id_empleado ? 'selected' : '' }}>
                                        {{ $empleado->nombre }} {{ $empleado->apellido_paterno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" name="fecha_hora" min="{{ now()->format('Y-m-d') }}T00:00" value="{{ old('fecha_hora') }}">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
