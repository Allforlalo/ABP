<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PonteGlamping</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #f8f9fa;">

    {{-- Navbar pública --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom border-warning border-4">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold fs-4" href="/">PONTE<span class="text-warning">GLAMPING</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPublico">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuPublico">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark" href="#nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark" href="#instalaciones">Instalaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark" href="#contacto">Contacto</a>
                    </li>
                    <li class="nav-item ms-2">
                        <button class="btn btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#modalLogin">
                            Iniciar sesión
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="py-5 text-center" style="background: linear-gradient(135deg, #1a472a 0%, #2d6a4f 50%, #52b788 100%); min-height: 60vh; display: flex; align-items: center;">
        <div class="container">
            <h1 class="display-4 fw-bold text-white mb-3">Bienvenido a PONTE<span class="text-warning">GLAMPING</span></h1>
            <p class="lead text-white mb-4">Una experiencia única en el corazón del Valle de Bravo. Naturaleza, confort y aventura en un solo lugar.</p>
            <a href="#nosotros" class="btn btn-warning btn-lg fw-bold px-5">Descubre más</a>
        </div>
    </section>

    {{-- Nosotros --}}
    <section id="nosotros" class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center border-bottom border-success border-2 pb-2 mb-4">¿Quiénes somos?</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <p class="fs-5 text-muted">
                        PonteGlamping es un destino de glamping de lujo ubicado en San Antonio 103, Valle de Bravo.
                        Ofrecemos una experiencia única que combina la belleza natural del entorno con la comodidad y el estilo de vida moderno.
                    </p>
                    <p class="fs-5 text-muted">
                        Nuestras instalaciones están diseñadas para que disfrutes de la naturaleza sin renunciar a ninguna comodidad,
                        con menús gourmet, actividades al aire libre y atención personalizada.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Instalaciones --}}
    <section id="instalaciones" class="py-5 bg-white">
        <div class="container">
            <h2 class="fw-bold text-center border-bottom border-success border-2 pb-2 mb-4">Nuestras instalaciones</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100 text-center p-4">
                        <div class="mb-3 fs-1">🏕️</div>
                        <h5 class="fw-bold">Glamping Deluxe</h5>
                        <p class="text-muted">Carpas equipadas con cama king size, baño privado y vista panorámica al bosque.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100 text-center p-4">
                        <div class="mb-3 fs-1">🍽️</div>
                        <h5 class="fw-bold">Restaurante</h5>
                        <p class="text-muted">Menú gourmet preparado con ingredientes locales y frescos para una experiencia gastronómica única.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100 text-center p-4">
                        <div class="mb-3 fs-1">🌲</div>
                        <h5 class="fw-bold">Actividades</h5>
                        <p class="text-muted">Senderismo, kayak, tirolesa y fogatas nocturnas para vivir una aventura completa en la naturaleza.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contacto --}}
    <section id="contacto" class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center border-bottom border-success border-2 pb-2 mb-4">Contacto</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 p-4 text-center">
                        <p class="mb-2"><strong>Dirección:</strong> San Antonio 103, Valle de Bravo, México</p>
                        <p class="mb-2"><strong>Teléfono:</strong> +52 (726) 000-0000</p>
                        <p class="mb-0"><strong>Email:</strong> contacto@ponteglamping.mx</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-1">Glamping Valle - San Antonio 103, Valle de Bravo.</p>
        </div>
    </footer>

    {{-- Modal login --}}
    <div class="modal fade" id="modalLogin" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-body p-5">
                    <h4 class="text-center fw-bold mb-1">PONTE<span class="text-warning">GLAMPING</span></h4>
                    <p class="text-center text-muted small mb-4">Acceso para personal</p>

                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-warning fw-bold py-2">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Abrir modal automáticamente si hay errores de login --}}
    @if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('modalLogin'));
            modal.show();
        });
    </script>
    @endif

</body>
</html>
