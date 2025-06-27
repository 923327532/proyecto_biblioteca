<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Préstamos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtnjm_A_w5K1chta_EVW1zkvtefTBawp6iCA&s') no-repeat center center fixed;
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
        <strong>📖 Gestión de Préstamos — Bienvenido, {{ Auth::user()->nombre }}</strong>
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

    <!-- FORMULARIO CON IMAGEN -->
    <div class="card-form">
        <div class="form-section">
            <h4 class="mb-4 text-center"><i class="bi bi-arrow-left-right"></i> Registrar nuevo préstamo</h4>
            <form action="/prestamos/crear" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label class="form-label">📚 Libro disponible:</label>
                    <select name="id_libro" class="form-select" required>
                        <option value="">Seleccione libro</option>
                        @foreach($libros_disponibles as $libro)
                            <option value="{{ $libro->id_libro }}">{{ $libro->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">👤 Usuario:</label>
                    <select name="id_usuario" class="form-select" required>
                        <option value="">Seleccione usuario</option>
                        @foreach($usuarios as $u)
                            <option value="{{ $u->id_usuario }}">{{ $u->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 d-grid mt-3">
                    <button class="btn btn-success btn-lg">
                        <i class="bi bi-check-circle"></i> Registrar Préstamo
                    </button>
                </div>
            </form>
        </div>
        <div class="image-section">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhA9K29BxHMH0WOe8_lhZR8Lwn44pElHTEVQ&s" alt="Imagen decorativa del formulario">
</div>

    </div>

    <!-- HISTORIAL -->
    <div class="table-container">
        <h4 class="mb-3 text-white"><i class="bi bi-clock-history"></i> Historial de Préstamos</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Libro</th>
                        <th>Usuario</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Devolución</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestamos as $p)
                    <tr>
                        <td>{{ $p->id_prestamo }}</td>
                        <td>{{ $p->titulo }}</td>
                        <td>{{ $p->nombre_usuario }}</td>
                        <td>{{ $p->fecha_prestamo }}</td>
                        <td>{{ $p->fecha_devolucion ?? '---' }}</td>
                        <td>
                            @if($p->devuelto == 'N')
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @else
                                <span class="badge bg-success">Devuelto</span>
                            @endif
                        </td>
                        <td>
                            @if($p->devuelto == 'N')
                                <a href="/prestamos/devolver/{{ $p->id_prestamo }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-arrow-return-left"></i> Devolver
                                </a>
                            @else
                                <span class="text-muted">✔</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
