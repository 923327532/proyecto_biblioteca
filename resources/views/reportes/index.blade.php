<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes de Préstamos</title>
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
            margin-right: 10px;
        }

        .logout {
            font-size: 14px;
        }

        .main-content {
            padding: 40px 20px;
        }

        .report-card {
            max-width: 1100px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
        }

        h3, h4 {
            color: #2c3e50;
            font-weight: bold;
        }

        .form-inline {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .form-inline input {
            width: 220px;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #f0f0f0;
        }

        .btn-primary i,
        .btn-outline-dark i {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header-bar">
    <div>
        <strong>📊 Reportes — Bienvenido, {{ Auth::user()->nombre }}</strong>
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
    <div class="report-card">
        <h3 class="mb-4"><i class="bi bi-bar-chart-line"></i> Reportes de Préstamos</h3>

        <form method="GET" class="form-inline">
            <label for="desde"><strong>Desde:</strong></label>
            <input type="date" name="desde" class="form-control" value="{{ $desde }}">
            <label for="hasta"><strong>Hasta:</strong></label>
            <input type="date" name="hasta" class="form-control" value="{{ $hasta }}">
            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Filtrar</button>
        </form>

        <!-- Libros más prestados -->
        <h4><i class="bi bi-book"></i> Libros más prestados</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Cantidad de Préstamos</th>
                </tr>
            </thead>
            <tbody>
                @forelse($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->cantidad }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="text-center text-muted">No hay resultados para mostrar.</td></tr>
                @endforelse
            </tbody>
        </table>

        <!-- Usuarios más activos -->
        <h4><i class="bi bi-person"></i> Usuarios más activos</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Préstamos Realizados</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $u)
                    <tr>
                        <td>{{ $u->nombre }}</td>
                        <td>{{ $u->prestamos }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="text-center text-muted">Sin registros disponibles.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
