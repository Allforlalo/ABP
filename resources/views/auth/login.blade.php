<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PonteGlamping — Iniciar sesión</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-dark d-flex align-items-center justify-content-center min-vh-100">

    <div class="card shadow-lg border-0" style="width: 400px;">
        <div class="card-header bg-dark text-warning text-center border-bottom border-warning border-2">
            <h4 class="mb-0 fw-bold">PONTE<span class="text-white">GLAMPING</span></h4>
            <small class="text-secondary">Panel de administración</small>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if($errors->any())
                    <div class="alert alert-danger py-2">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ old('email') }}" autofocus required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-warning fw-bold">Iniciar sesión</button>
                </div>
                <div class="d-grid">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Regresar</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
