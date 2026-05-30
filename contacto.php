<?php
require_once("conexion.php");
$alerta = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitización básica de los datos recibidos (Lógica PHP intacta)
    $nombre = htmlspecialchars(trim($_POST['nombre']), ENT_QUOTES, 'UTF-8');
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars(trim($_POST['mensaje']), ENT_QUOTES, 'UTF-8');

    // Validación básica en el servidor (Lógica PHP intacta)
    if (!empty($nombre) && !empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL) && !empty($mensaje)) {
        
        // Consulta preparada para mayor seguridad (Lógica PHP intacta)
        $stmt = $conexion->prepare("INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $mensaje);
        
        if ($stmt->execute()) {
            $alerta = "<div class='alert alert-success text-center'>¡Mensaje enviado con éxito! Lo revisaré pronto en mi panel.</div>";
        } else {
            $alerta = "<div class='alert alert-danger text-center'>Hubo un error de conexión al enviar el mensaje.</div>";
        }
        $stmt->close();
    } else {
        $alerta = "<div class='alert alert-warning text-center'>Por favor, completa todos los campos con un formato válido.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Mi Portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos globales unificados de la web */
        .bg-navy { background-color: #031926; } 
        
        /* Textos sobre fondo oscuro (Navbar y Footer) */
        .nav-link { color: #ffffff !important; } 
        .nav-link:hover { color: #ffffff !important; } 
        .text-light-gray { color: #ffffff; }

        /* --- RESTAURACIÓN DEL DISEÑO ORIGINAL DEL FORMULARIO --- */
        /* Cuerpo con fondo claro por defecto */
        body { background-color: #f8f9fa; color: #ffffff; } 
        main { color: initial; } /* Reseteo de color de texto para el contenido principal */

    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <header>
        <nav class="navbar navbar-expand-lg bg-navy py-3 shadow">
            <div class="container">
                <a class="navbar-brand fw-bold text-light-gray" href="index.php">Mi Portafolio</a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fw-semibold">
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="contacto.php">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 bg-white">
                    <div class="card-header border-bottom-0 pt-5 pb-0 text-center bg-transparent">
                        <h1 class="fw-bold h2">Ponte en contacto</h1>
                        <p class="text-muted">Envíame un mensaje y te responderé lo antes posible.</p>
                    </div>
                    <div class="card-body px-5 pb-5 pt-4">
                        
                        <?= $alerta ?>

                        <form method="POST" action="contacto.php">
                            <div class="mb-4">
                                <label for="nombre" class="form-label fw-bold">Nombre completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ej: Juan Pérez">
                            </div>
                            <div class="mb-4">
                                <label for="correo" class="form-label fw-bold">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required placeholder="tu@correo.com">
                            </div>
                            <div class="mb-4">
                                <label for="mensaje" class="form-label fw-bold">Mensaje</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required placeholder="Escribe tu mensaje aquí..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark w-100 fw-bold py-3 mt-2 rounded-2">Enviar Mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-navy text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0 text-light-gray">&copy; 2026 - Mi Portafolio Personal. Desarrollado con HTML5, PHP y Bootstrap.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>