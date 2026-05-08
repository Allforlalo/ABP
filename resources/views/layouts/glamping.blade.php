<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PonteGlamping</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom border-warning border-4">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('dashboard') }}">PONTE<span class="text-warning">GLAMPING</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNavegacion">
                @auth
                    @if(auth()->user()->usuario === 'administrador')
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold text-dark dropdown-toggle" href="#" data-bs-toggle="dropdown">Catálogos</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('bancos.index') }}">Bancos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cargos.index') }}">Cargos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Categorías</a></li>
                                    <li><a class="dropdown-item" href="{{ route('tipos_tarjeta.index') }}">Tipos de tarjeta</a></li>
                                    <li><a class="dropdown-item" href="{{ route('horarios.index') }}">Horarios</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold text-dark dropdown-toggle" href="#" data-bs-toggle="dropdown">Personas</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('personas.index') }}">Personas</a></li>
                                    <li><a class="dropdown-item" href="{{ route('clientes.index') }}">Clientes</a></li>
                                    <li><a class="dropdown-item" href="{{ route('empleados.index') }}">Empleados</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold text-dark dropdown-toggle" href="#" data-bs-toggle="dropdown">Operaciones</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('productos.index') }}">Productos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pedidos.index') }}">Pedidos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('detalles_pedido.index') }}">Detalles de pedido</a></li>
                                    <li><a class="dropdown-item" href="{{ route('tarjetas.index') }}">Tarjetas</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-dark" href="{{ route('usuarios.index') }}">Cuentas</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold text-dark dropdown-toggle" href="#" data-bs-toggle="dropdown">Operaciones</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('clientes.index') }}">Clientes</a></li>
                                    <li><a class="dropdown-item" href="{{ route('productos.index') }}">Productos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pedidos.index') }}">Pedidos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('detalles_pedido.index') }}">Detalles de pedido</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    <div class="d-flex align-items-center gap-3">
                        @if(!Route::is('dashboard'))
                            <a class="btn btn-outline-warning fw-bold btn-sm" href="{{ route('dashboard') }}">Regresar</a>
                        @endif
                        <span class="text-muted small">{{ auth()->user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-dark btn-sm fw-bold">Cerrar sesión</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-1">Glamping Valle - San Antonio 103, Valle de Bravo.</p>
        </div>
    </footer>

</body>
</html>
