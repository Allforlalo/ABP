@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Nueva Venta</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form novalidate action="{{ route('ventas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="id_cliente" class="form-select">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Empleado</label>
                    <select name="id_empleado" class="form-select">
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
