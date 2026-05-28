@extends('glamping.layout')

@section('content')
    <h2 class="mb-3">Nuevo Registro Ponteglamping</h2>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form novalidate action="{{ route('ponteglamping.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Glamping</label>
                    <input type="number" name="glamping" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Venta</label>
                    <select name="id_venta" class="form-select">
                        @foreach($ventas as $venta)
                            <option value="{{ $venta->id_venta }}">{{ $venta->id_venta }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('ponteglamping.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
