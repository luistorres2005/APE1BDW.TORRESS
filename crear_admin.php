<?php
require_once("conexion.php");

$nombre = "Yober Luis Torres";
$correo = "admin@miweb.com";
$clave_plana = "FGoptinet1";
$cedula = "1234567890"; // Inventada por ahora

// Encriptamos la contraseña con la misma seguridad que pide tu login
$hash = password_hash($clave_plana, PASSWORD_DEFAULT);

$stmt = $conexion->prepare("INSERT INTO usuarios (cedula, nombre, correo, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $cedula, $nombre, $correo, $hash);

if ($stmt->execute()) {
    echo "<h3 style='color:green;'>¡Usuario Administrador creado con éxito!</h3>";
    echo "<b>Correo:</b> " . $correo . "<br>";
    echo "<b>Contraseña:</b> " . $clave_plana . "<br><br>";
    echo "<strong style='color:red;'>MUY IMPORTANTE: Por seguridad, elimina este archivo (crear_admin.php) de tu carpeta ahora mismo.</strong>";
} else {
    echo "Error al crear el usuario: " . $conexion->error;
}
$stmt->close();
?>