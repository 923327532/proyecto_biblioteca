<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1519681393784-d120267933ba') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header-bar {
            background-color: rgba(255,255,255,0.95);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
        }

        .nav-buttons a {
            margin-right: 15px;
        }

        .main-content {
            padding: 30px 20px;
        }

        .card-form {
            max-width: 1000px;
            margin: 0 auto 40px auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            display: flex;
            overflow: hidden;
        }

        .form-section {
            flex: 1;
            padding: 30px;
        }

        .image-section {
            flex: 1;
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .table-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .logout {
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header-bar">
    <div>
        <strong>🏷️ Gestión de Categorías — Bienvenido, {{ Auth::user()->nombre }}</strong>
    </div>
    <div class="nav-buttons">
        <a href="/home" class="btn btn-outline-dark btn-sm"><i class="bi bi-house"></i> Inicio</a>
        <a href="/libros" class="btn btn-outline-primary btn-sm"><i class="bi bi-book"></i> Libros</a>
        <a href="/prestamos" class="btn btn-outline-success btn-sm"><i class="bi bi-journal-check"></i> Préstamos</a>
        <a href="/categorias" class="btn btn-outline-secondary btn-sm"><i class="bi bi-tags"></i> Categorías</a>
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

    <!-- FORMULARIO -->
    <div class="card-form">
        <div class="form-section">
            <h4 class="mb-4 text-center"><i class="bi bi-tags"></i> Agregar Nueva Categoría</h4>
            <form action="/categorias/crear" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-type"></i> Nombre de la categoría</label>
                    <input type="text" class="form-control form-control-lg" name="nombre_categoria" required placeholder="Ej. Ciencia Ficción">
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg"><i class="bi bi-plus-circle"></i> Guardar Categoría</button>
                </div>
            </form>
        </div>
        div class="image-section">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiGFw7fxjz6Q3UVOYr4KjkrsQTOfb6baZieg&s" alt="Imagen decorativa del formulario">
</div>
    </div>

    <!-- LISTADO -->
    <div class="table-container">
        <h4 class="mb-3 text-white"><i class="bi bi-list-ul"></i> Lista de Categorías</h4>
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $cat)
                <tr>
                    <td>{{ $cat->id_categoria }}</td>
                    <td>{{ $cat->nombre_categoria }}</td>
                    <td>
                        <a href="/categorias/eliminar/{{ $cat->id_categoria }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta categoría?')">
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
