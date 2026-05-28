<?php
session_start();
require_once("conexion.php");

// Si no ha iniciado sesión, lo regresamos al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Consultar los mensajes recibidos, ordenados por fecha descendente
$query = "SELECT id, nombre, correo, mensaje, fecha_envio FROM mensajes ORDER BY fecha_envio DESC";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Catálogo de Mensajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Panel de Administración</span>
        <div class="d-flex">
            <a href="index.php" target="_blank" class="btn btn-outline-info me-2">Ver mi Web</a>
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="alert alert-primary shadow-sm">
        <h4 class="mb-0">¡Bienvenido al panel, <?= htmlspecialchars($_SESSION['nombre'], ENT_QUOTES, 'UTF-8') ?>!</h4>
        <p class="mb-0">Aquí puedes gestionar y leer todos los mensajes que te envían desde tu sitio web.</p>
    </div>

    <h3 class="mt-5 mb-3 border-bottom pb-2">Bandeja de Entrada (Catálogo Dinámico)</h3>
    
    <div class="table-responsive bg-white p-3 rounded shadow-sm mb-5">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td class="fw-bold"><?= htmlspecialchars($fila['id']) ?></td>
                            <td><?= htmlspecialchars($fila['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><a href="mailto:<?= htmlspecialchars($fila['correo']) ?>"><?= htmlspecialchars($fila['correo'], ENT_QUOTES, 'UTF-8') ?></a></td>
                            <td style="max-width: 300px; word-wrap: break-word;">
                                <?= nl2br(htmlspecialchars($fila['mensaje'], ENT_QUOTES, 'UTF-8')) ?>
                            </td>
                            <td class="text-muted"><?= htmlspecialchars($fila['fecha_envio']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Aún no tienes mensajes en tu bandeja.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
        <small>&copy; 2026 - yltorres3 - Torres Cabezas Yober Luis</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>