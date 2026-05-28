<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mi Portafolio Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="index.php">Mi Portafolio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="login.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        
        <section id="sobre-mi" class="row align-items-center mb-5 bg-white p-4 rounded shadow-sm">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <img src="img/perfil_2x2.jpg" alt="Mi foto de perfil" class="img-fluid rounded shadow" style="width: 250px; height: 250px; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <h1 class="fw-bold">¡Hola! Bienvenido a mi sitio web</h1>
                <p class="lead text-muted">Estudiante de Tecnologías de la Información desde Shushufindi.</p>
                <p>
                    Me considero una persona práctica, orientada a la ejecución técnica más que a la teoría pura. 
                    Actualmente estoy enfocando mis estudios en el área de la ciberseguridad y el análisis de redes. 
                    Mi objetivo profesional a mediano plazo es integrarme a un <strong>Security Operations Center (SOC)</strong>, 
                    para luego dar el salto hacia la <strong>Informática Forense (DFIR)</strong>. 
                </p>
                <p>
                    Me gusta resolver problemas desarrollando sistemas web seguros y gestionando bases de datos relacionales, 
                    siempre buscando mejorar mis hábitos de estudio y evitar la procrastinación para lograr mis metas.
                </p>
            </div>
        </section>

        <section id="hobbies" class="mb-5">
            <h2 class="text-center fw-bold mb-4">Mis Hobbies e Intereses</h2>
            <div class="row g-4">
                
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <h3 class="card-title fs-1">🛡️</h3>
                            <h5 class="card-title fw-bold">Ciberseguridad Práctica</h5>
                            <p class="card-text">
                                Dedico mi tiempo libre a resolver retos en plataformas como TryHackMe y comprender vectores de ataque como la ingeniería social, el phishing y los ataques de fuerza bruta.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <h3 class="card-title fs-1">📡</h3>
                            <h5 class="card-title fw-bold">Análisis de Redes</h5>
                            <p class="card-text">
                                Me apasiona capturar y analizar tráfico. Utilizo herramientas prácticas como Wireshark y Nmap para entender a fondo cómo se comunican los sistemas y detectar anomalías.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <h3 class="card-title fs-1">💻</h3>
                            <h5 class="card-title fw-bold">Desarrollo Web y BD</h5>
                            <p class="card-text">
                                Construyo sistemas de autenticación y gestiono bases de datos MySQL, materializando tablas e implementando fuertes controles de acceso y seguridad.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; 2026 - Mi Portafolio Personal. Desarrollado con HTML5, PHP y Bootstrap.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>