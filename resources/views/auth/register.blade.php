<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<<<<<<< HEAD
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background: url('https://www.claustrofobias.com/wp-content/uploads/2021/01/Biblioteca-nacional-Jose-marti.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
        }
    </style>
=======
    
    <style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        background: url('https://www.claustrofobias.com/wp-content/uploads/2021/01/Biblioteca-nacional-Jose-marti.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', sans-serif;
        display: flex;
        justify-content: center; 
        align-items: center;     
    }

    .register-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 450px;
    }
</style>

>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
</head>
<body>
    <div class="register-card">
        <h3 class="text-center mb-4"><i class="bi bi-person-plus"></i> Registro de Usuario</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="small">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf
<<<<<<< HEAD

=======
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" name="nombre" class="form-control" required placeholder="Tu nombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required placeholder="correo@ejemplo.com">
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required placeholder="••••••••">
            </div>

<<<<<<< HEAD
            <div class="mb-3">
                <label class="form-label">Tipo de cuenta</label>
                <select name="rol" class="form-select" required>
                    <option value="usuario">Usuario</option>
                    <option value="bibliotecario">Bibliotecario</option>
                </select>
            </div>
=======
            <input type="hidden" name="rol" value="usuario">
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32

            <div class="d-grid mb-3">
                <button class="btn btn-success">Registrarse</button>
            </div>

            <div class="text-center">
                <a href="/login" class="text-decoration-none">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </form>
    </div>
</body>
</html>
