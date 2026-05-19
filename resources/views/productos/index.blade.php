@extends('layouts.glamping')

@section('content')
<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-warning d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Lista de Productos</h4>
                    <a class="btn btn-warning btn-sm fw-bold" href="{{ route('productos.create') }}">Nuevo Producto</a>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>${{ number_format($producto->precio, 2) }}</td>
                                    <td>{{ $producto->categoria }}</td>
                                    <td>
                                        <a class="btn btn-warning px-3" href="{{ route('productos.edit', $producto->id_producto) }}">Editar</a>
                                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-3">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
