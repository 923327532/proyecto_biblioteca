<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTF815eH7yX4ZuKrYiYdbEAbseFlYOLLv4SJg&s') no-repeat center center fixed;
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
            text-decoration: none;
        }

        .nav-buttons .btn {
            border-radius: 20px;
        }

        .main-content {
            padding: 30px 20px;
        }

        .card-form {
            max-width: 1100px;
            margin: 0 auto 50px auto;
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
            max-width: 1100px;
            margin: 0 auto 40px auto;
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
        <strong>📚 Gestión de Libros — Bienvenido, {{ Auth::user()->nombre }}</strong>
    </div>
    <div class="nav-buttons">
        <a href="/home" class="btn btn-outline-dark btn-sm"><i class="bi bi-house"></i> Inicio</a>
        <a href="/libros" class="btn btn-outline-primary btn-sm"><i class="bi bi-book"></i> Libros</a>
        <a href="/prestamos" class="btn btn-outline-success btn-sm"><i class="bi bi-journal-check"></i> Préstamos</a>
        <a href="#" class="btn btn-outline-warning btn-sm"><i class="bi bi-people"></i> Usuarios</a>
        <a href="#" class="btn btn-outline-secondary btn-sm"><i class="bi bi-tags"></i> Categorías</a>
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

    <!-- FORMULARIO Y IMAGEN EN EL MISMO BLOQUE -->
    <div class="card-form">
        <div class="form-section">
            <h4 class="mb-4 text-center"><i class="bi bi-journal-plus"></i> Agregar Nuevo Libro</h4>
            <form action="/libros/crear" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-book"></i> Título del Libro</label>
                    <input type="text" class="form-control form-control-lg" name="titulo" required placeholder="Ej. Cien años de soledad">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-person"></i> Autor</label>
                    <input type="text" class="form-control form-control-lg" name="autor" required placeholder="Ej. Gabriel García Márquez">
                </div>
                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-tags"></i> Categoría</label>
                    <select name="id_categoria" class="form-select form-select-lg" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id_categoria }}">{{ $cat->nombre_categoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg">
                        <i class="bi bi-plus-circle"></i> Guardar Libro
                    </button>
                </div>
            </form>
        </div>
        <div class="image-section">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjCqJnsg44lS6q0tCny9i0WVygbVL9kBhI3A&s" alt="Imagen decorativa del formulario">
</div>

    </div>

    <!-- LISTA DE LIBROS -->
    <div class="table-container">
        <h4 class="mb-3 text-white"><i class="bi bi-list-ul"></i> Lista de Libros</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($libros as $libro)
                    <tr>
                        <form action="/libros/actualizar/{{ $libro->id_libro }}" method="POST">
                            @csrf
                            <td>{{ $libro->id_libro }}</td>
                            <td><input type="text" name="titulo" value="{{ $libro->titulo }}" class="form-control"></td>
                            <td><input type="text" name="autor" value="{{ $libro->autor }}" class="form-control"></td>
                            <td>
                                <select name="id_categoria" class="form-select">
                                    @foreach($categorias as $cat)
                                        <option value="{{ $cat->id_categoria }}" {{ $libro->nombre_categoria == $cat->nombre_categoria ? 'selected' : '' }}>
                                            {{ $cat->nombre_categoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-success btn-sm"><i class="bi bi-arrow-repeat"></i></button>
                                    <a href="/libros/eliminar/{{ $libro->id_libro }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este libro?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
