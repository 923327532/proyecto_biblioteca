<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkkc49YMVygqdEmqeJ5kkcEc-Fb1sZDVv0wA&s') no-repeat center center fixed;
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

        .card-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            padding: 100px 30px 60px; /* Más separación del header */
        }

        .flip-card {
            perspective: 1000px;
            width: 350px;
            height: 420px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: transform 0.4s;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-card.flipped .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 15px;
            overflow: hidden;
        }

        .flip-card-front {
            background-color: rgba(255,255,255,0.95);
            z-index: 2;
        }

        .flip-card-back {
            background-color: rgba(245, 245, 245, 0.95);
            transform: rotateY(180deg);
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .flip-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .flip-card .card-body {
            padding: 20px;
        }

        .card-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #2c3e50;
        }

        .card-text {
            font-size: 0.95rem;
            color: #555;
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
            <strong>👋 Bienvenido, {{ Auth::user()->nombre }}</strong>
        </div>
<<<<<<< HEAD
     <div class="nav-buttons">
    <a href="/libros" class="btn btn-outline-primary btn-sm"><i class="bi bi-book"></i> Libros</a>
    <a href="/prestamos" class="btn btn-outline-success btn-sm"><i class="bi bi-journal-check"></i> Préstamos</a>

    @if(Auth::user()->rol === 'bibliotecario')
        <a href="/usuarios" class="btn btn-outline-warning btn-sm"><i class="bi bi-people"></i> Usuarios</a>
        <a href="/categorias" class="btn btn-outline-secondary btn-sm"><i class="bi bi-tags"></i> Categorías</a>
        <a href="/reportes" class="btn btn-outline-info btn-sm"><i class="bi bi-bar-chart-line"></i> Reportes</a>
    @endif
</div>



=======
        <div class="nav-buttons">
    <a href="/libros" class="btn btn-outline-primary btn-sm"><i class="bi bi-book"></i> Libros</a>
    <a href="/prestamos" class="btn btn-outline-success btn-sm"><i class="bi bi-journal-check"></i> Préstamos</a>
    <a href="/usuarios" class="btn btn-outline-warning btn-sm"><i class="bi bi-people"></i> Usuarios</a>
    <a href="/categorias" class="btn btn-outline-secondary btn-sm"><i class="bi bi-tags"></i> Categorías</a>
</div>

>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
        <form action="/logout" method="POST" class="m-0">
            @csrf
            <button class="btn btn-danger btn-sm logout"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</button>
        </form>
    </div>

    <!-- MAIN CONTENT -->
    <div class="card-section">

        <!-- Tarjeta 1 -->
        <div class="flip-card" onclick="this.classList.toggle('flipped')">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765" alt="libro">
                    <div class="card-body">
                        <h5 class="card-title">El poder de la lectura</h5>
                        <p class="card-text">Haz clic para descubrir la historia.</p>
                    </div>
                </div>
                <div class="flip-card-back">
                    <h5>El poder de la lectura</h5>
                    <p>Leer es viajar sin moverse, es escuchar sin que hablen, es crecer sin darte cuenta. Cada libro es un universo entero.</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="flip-card" onclick="this.classList.toggle('flipped')">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b" alt="biblioteca">
                    <div class="card-body">
                        <h5 class="card-title">Nuestra Biblioteca Virtual</h5>
                        <p class="card-text">Haz clic para descubrir la historia.</p>
                    </div>
                </div>
                <div class="flip-card-back">
                    <h5>Una biblioteca abierta al futuro</h5>
                    <p>Una plataforma creada para fomentar el conocimiento, donde el saber está a un clic de distancia para todos los estudiantes.</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="flip-card" onclick="this.classList.toggle('flipped')">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66" alt="secreto">
                    <div class="card-body">
                        <h5 class="card-title">Un secreto entre libros</h5>
                        <p class="card-text">Haz clic para descubrir la historia.</p>
                    </div>
                </div>
                <div class="flip-card-back">
                    <h5>Entre líneas...</h5>
                    <p>Detrás de cada historia hay un autor que soñó, que vivió, y que ahora habla contigo en silencio a través de sus palabras.</p>
                </div>
            </div>
        </div>

    </div>
    <script>
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-buttons a').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.remove('btn-outline-primary', 'btn-outline-success', 'btn-outline-warning', 'btn-outline-secondary');
            link.classList.add('btn-dark');
        }
    });
</script>


</body>
</html>
