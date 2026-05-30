<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mi Portafolio Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Paleta base conservada, tipografía ajustada a escala de grises y negros */
        body { background-color: #f8f9fa; color: #000000; } /* Fondo champaña, texto casi negro */
        .bg-navy { background-color: #031926; } 
        .text-gris { color: #62686e; } /* Gris medio y elegante para subtítulos */
        .card-custom { background-color: #9DBEBB; border: none; border-radius: 1rem; color: #000000; }
        .foto-borde { border: 5px solid #545b62; } /* Borde de foto gris haciendo juego */
        
        /* Textos sobre fondo oscuro (Navbar y Footer) */
        .nav-link { color: #ffffff !important; } /* Gris claro para el navbar oscuro */
        .nav-link:hover { color: #ffffff !important; } /* Blanco puro al pasar el mouse */
        .text-light-gray { color: #ffffff; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg bg-navy py-3 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold text-light-gray" href="index.php">Mi Portafolio</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-semibold">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="login.php">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-5 mb-5 flex-grow-1">
        
        <div class="row align-items-center mb-5">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <img src="img/perfil_2x2.jpg" alt="Perfil" class="img-fluid rounded-circle shadow-lg foto-borde" style="max-width: 250px;">
            </div>
            <div class="col-md-8">
                <h1 class="fw-bold">¡Hola! Bienvenido a mi web</h1>
                <h4 class="text-gris fw-bold mb-4">Estudiante de TI enfocado en la práctica</h4>
                <p class="fs-5">
                    Soy de los que prefieren "meter mano" configurando en Wireshark antes que leer mil PDFs de teoría. 
                    Actualmente me enfoco en ciberseguridad y análisis de redes. Mi norte es llegar a un <strong>SOC</strong> y, a futuro, dar el salto a la <strong>Informática Forense (DFIR)</strong>.
                </p>
            </div>
        </div>

        <h2 class="text-center fw-bold mb-4">Mis Intereses</h2>
        <div class="row g-4 text-center">
            
            <div class="col-md-4">
                <div class="card card-custom h-100 p-4 shadow-sm transition">
                    <h1 class="display-4">🛡️</h1>
                    <h5 class="fw-bold mt-2">Ciberseguridad</h5>
                    <p class="mb-0">Resolviendo retos en TryHackMe y estudiando vectores de ataque, desde phishing hasta fuerza bruta.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 p-4 shadow-sm">
                    <h1 class="display-4">📡</h1>
                    <h5 class="fw-bold mt-2">Análisis de Redes</h5>
                    <p class="mb-0">Capturando tráfico para entender realmente cómo se comunican los sistemas por debajo de la mesa.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 p-4 shadow-sm">
                    <h1 class="display-4">💻</h1>
                    <h5 class="fw-bold mt-2">Desarrollo Web</h5>
                    <p class="mb-0">Armando sistemas de login con contraseñas seguras y maquetando bases de datos bien estructuradas.</p>
                </div>
            </div>

        </div>
    </main>

    <footer class="bg-navy text-center py-4 mt-auto">
        <p class="mb-0 text-light-gray">&copy; 2026 - Yober Luis Torres Cabezas</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>