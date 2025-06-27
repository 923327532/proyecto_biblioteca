<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        background: url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 500px;
        min-height: 520px; /
    }
</style>

</head>
<body>
    <div class="login-card">
        <h3 class="text-center mb-4"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</h3>

        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required placeholder="tucorreo@email.com">
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required placeholder="••••••••">
            </div>

            <div class="d-grid mb-3">
                <button class="btn btn-primary">Entrar</button>
            </div>

            <div class="text-center">
                <a href="/register" class="text-decoration-none">¿No tienes cuenta? Regístrate</a>
            </div>
        </form>
    </div>
</body>
</html>
