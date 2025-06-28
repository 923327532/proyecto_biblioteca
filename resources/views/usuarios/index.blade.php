<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1529333166437-7750a6dd5a70') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header-bar {
            background-color: rgba(255,255,255,0.95);
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-buttons a {
            margin-right: 12px;
        }

        .logout {
            font-size: 14px;
        }

        .main-content {
            padding: 50px 20px;
        }

        .card-glass {
            max-width: 1100px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(5px);
        }

        h4 {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        .table th {
            background-color: #f1f1f1;
        }

        .table-hover tbody tr:hover {
            background-color: #f9f9f9;
        }

        .btn-danger i {
            margin-right: 4px;
        }

        .alert-success {
            max-width: 900px;
            margin: 0 auto 20px auto;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header-bar">
    <div>
        <strong>👤 Gestión de Usuarios — Bienvenido, {{ Auth::user()->nombre }}</strong>
    </div>
    <div class="nav-buttons">
        <a href="/home" class="btn btn-outline-dark btn-sm"><i class="bi bi-house"></i> Inicio</a>
        <a href="/libros" class="btn btn-outline-primary btn-sm"><i class="bi bi-book"></i> Libros</a>
        <a href="/prestamos" class="btn btn-outline-success btn-sm"><i class="bi bi-journal-check"></i> Préstamos</a>
        <a href="/categorias" class="btn btn-outline-secondary btn-sm"><i class="bi bi-tags"></i> Categorías</a>
        <a href="/reportes" class="btn btn-outline-info btn-sm"><i class="bi bi-bar-chart-line"></i> Reportes</a>
    </div>
    <form action="/logout" method="POST" class="m-0">
        @csrf
        <button class="btn btn-danger btn-sm logout"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</button>
    </form>
</div>

<!-- CONTENIDO -->
<div class="main-content">

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="card-glass">
        <h4><i class="bi bi-people"></i> Lista de Usuarios</h4>
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $user)
                <tr>
                    <td>{{ $user->id_usuario }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->rol) }}</td>
                    <td>
                        <a href="/usuarios/eliminar/{{ $user->id_usuario }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este usuario?')">
                            <i class="bi bi-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
