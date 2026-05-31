<?php
// Variables de configuración de la base de datos
$servidor = "sql113.infinityfree.com";
$usuario = "if0_42058423";
$contrasena = "TC81qZD81xqsHJ";
$basedatos = "if0_42058423_ape1b_torress";

// Crear conexión con MySQLi
$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

// Verificar si existe error de conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos.");
}
$conexion->set_charset("utf8mb4");
?>