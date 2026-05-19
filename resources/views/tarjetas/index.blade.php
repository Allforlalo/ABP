@extends('layouts.glamping')

@section('content')
<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-warning d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Lista de Tarjetas</h4>
                    <a class="btn btn-warning btn-sm fw-bold" href="{{ route('tarjetas.create') }}">Nueva Tarjeta</a>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Número</th>
                                    <th>Titular</th>
                                    <th>Tipo</th>
                                    <th>Banco</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tarjetas as $tarjeta)
                                <tr>
                                    <td>{{ $tarjeta->numero_tarjeta }}</td>
                                    <td>{{ $tarjeta->nombre }} {{ $tarjeta->apellido_paterno }}</td>
                                    <td>{{ $tarjeta->tipo }}</td>
                                    <td>{{ $tarjeta->banco }}</td>
                                    <td>
                                        <a class="btn btn-warning px-3" href="{{ route('tarjetas.edit', $tarjeta->id_tarjeta) }}">Editar</a>
                                        <form action="{{ route('tarjetas.destroy', $tarjeta->id_tarjeta) }}" method="POST" style="display:inline;" class="delete-form">
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
