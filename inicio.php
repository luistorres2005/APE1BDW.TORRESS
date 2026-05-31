<?php
session_start();
require_once("conexion.php");

// Si no ha iniciado sesión, lo regresamos al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Consultar los mensajes recibidos
$query = "SELECT id, nombre, correo, mensaje, fecha_envio FROM mensajes ORDER BY fecha_envio DESC";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel admin - Mensajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>        
        .bg-navy { background-color: #031926; } 
        .text-gris { color: #62686e; }         
        
        .text-light-gray { color: #ffffff; }
        .table-navy th { background-color: #031926; color: #ffffff; border-color: #031926; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg bg-navy py-3 shadow">
    <div class="container">
        <span class="navbar-brand fw-bold text-light-gray">Panel de administración</span>
        <div class="d-flex">
            <a href="index.php" target="_blank" class="btn btn-outline-light me-2 fw-bold">Ver mi web</a>
            <a href="logout.php" class="btn btn-danger fw-bold">Cerrar sesión</a>
        </div>
    </div>
</nav>

<div class="container mt-4 flex-grow-1">
    <div class="alert bg-white shadow-sm border-0 py-3">
        <h4 class="mb-1 fw-bold">¡Bienvenido al panel, <?= htmlspecialchars($_SESSION['nombre'], ENT_QUOTES, 'UTF-8') ?>!</h4>
        <p class="mb-0 text-gris">Aquí puedes gestionar y leer todos los mensajes que te envían desde tu sitio web.</p>
    </div>

    <h3 class="mt-5 mb-3 border-bottom pb-2 fw-bold">Bandeja de entrada</h3>
    
    <div class="table-responsive bg-white p-3 rounded shadow-sm mb-5">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="table-navy">
                    <th scope="col" class="py-3">#</th>
                    <th scope="col" class="py-3">Nombre</th>
                    <th scope="col" class="py-3">Correo</th>
                    <th scope="col" class="py-3">Mensaje</th>
                    <th scope="col" class="py-3">Fecha y hora</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td class="fw-bold"><?= htmlspecialchars($fila['id']) ?></td>
                            <td class="fw-bold"><?= htmlspecialchars($fila['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><a href="mailto:<?= htmlspecialchars($fila['correo']) ?>" class="text-decoration-none text-dark fw-semibold"><?= htmlspecialchars($fila['correo'], ENT_QUOTES, 'UTF-8') ?></a></td>
                            <td style="max-width: 300px; word-wrap: break-word;">
                                <?= nl2br(htmlspecialchars($fila['mensaje'], ENT_QUOTES, 'UTF-8')) ?>
                            </td>
                            <td class="text-gris small fw-semibold"><?= htmlspecialchars($fila['fecha_envio']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-gris py-5">Aún no tienes mensajes en tu bandeja.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<footer class="bg-navy text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-0 text-light-gray">&copy; 2026 - Yober Luis Torres Cabezas</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>