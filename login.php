<?php
session_start();
require_once("conexion.php");

if (isset($_SESSION['usuario_id'])) {
    header("Location: inicio.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $clave_plana = $_POST['password'];

    if (!empty($correo) && !empty($clave_plana)) {
        $stmt = $conexion->prepare("SELECT id, nombre, password FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if ($usuario && password_verify($clave_plana, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            header("Location: inicio.php");
            exit;
        } else {            
            $_SESSION['error_login'] = "Credenciales incorrectas.";
            header("Location: login.php");
            exit;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso privado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa; 
        } 
        .bg-navy { background-color: #031926;} 
        .text-gris {color: #62686e;}        
        .text-negro { color: #000000 !important;}

        .btn-navy { 
            background-color: #031926; 
            color: #ffffff; 
            border: none; 
            transition: 0.3s; 
        }

        .btn-navy:hover { background-color: #021019; color: #ffffff; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="w-100" style="max-width: 450px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-navy text-white text-center py-3">
                <h5 class="mb-0 fw-bold">Acceso privado</h5>
            </div>
            <div class="card-body p-4 bg-white border border-top-0">
                
                <?php if (isset($_SESSION['error_login'])): ?>
                    <div class='alert alert-danger'><?= $_SESSION['error_login'] ?></div>
                    <?php unset($_SESSION['error_login']); ?>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-negro" style="font-size: 0.9rem;">Correo electrónico</label>
                        <input type="email" name="correo" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-negro" style="font-size: 0.9rem;">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-navy w-100 py-2">Iniciar sesión</button>
                </form>
                <div class="mt-4 text-center">
                    <a href="index.php" class="text-decoration-none text-gris" style="font-size: 0.85rem;">Volver a la página principal</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>