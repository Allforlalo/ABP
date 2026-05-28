<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PonteGlamping</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom border-warning border-4">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">PONTE<span class="text-warning">GLAMPING</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPublico">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuPublico">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark" href="{{ route('menu') }}">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark" href="{{ route('instalaciones') }}">Instalaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark" href="{{ route('mis_pedidos.cliente') }}">Mis Pedidos</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    @if(!Route::is('home'))
                        <a class="btn btn-outline-warning btn-sm fw-bold" href="{{ route('home') }}">Regresar</a>
                    @endif
                    <a class="btn btn-warning fw-bold btn-sm" href="{{ route('login') }}">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "{{ session('success') }}",
                    icon: "success",
                    draggable: true
                });
            });
        </script>
        @endif
        @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const errors = @json($errors->all());
                const html = '<ul class="text-start mb-0">' + errors.map(e => '<li>' + e + '</li>').join('') + '</ul>';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: html
                });
            });
        </script>
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
