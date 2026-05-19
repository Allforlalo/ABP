@extends('layouts.glamping')

@section('content')
<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-warning d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Lista de Cargos</h4>
                    <a class="btn btn-warning btn-sm fw-bold" href="{{ route('cargos.create') }}">Nuevo Cargo</a>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cargos as $cargo)
                                <tr>
                                    <td>{{ $cargo->nombre }}</td>
                                    <td>
                                        <a class="btn btn-warning px-3" href="{{ route('cargos.edit', $cargo->id_cargo) }}">Editar</a>
                                        <form action="{{ route('cargos.destroy', $cargo->id_cargo) }}" method="POST" style="display:inline;" class="delete-form">
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
