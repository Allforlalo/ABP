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
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="{{ url('/') }}">PONTE<span class="text-warning">GLAMPING</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNavegacion">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ route('pedidos_platillos.index') }}">Pedidos Platillos</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ route('pedidos_bebidas.index') }}">Pedidos Bebidas</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ route('tarjetas_pago.index') }}">Formas de Pago</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ route('glamping.instalaciones') }}">Instalaciones</a></li>
                </ul>
                <a href="{{ route('ventas.index') }}" class="btn btn-success fw-bold">Punto de Venta</a>
            </div>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-1">Glamping Valle - San Antonio 103, Valle de Bravo.</p>
            <a href="#" class="text-secondary small text-decoration-none">Acceso a Empleados (Punto de Venta)</a>
        </div>
    </footer>

    @vite(['resources/js/app.js'])
</body>
</html>
