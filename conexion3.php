<?php
$host = "localhost:3308";   // Cambia a tu host si es necesario
$username = "admin";        // Usuario de tu base de datos
$password = "12345";        // Contraseña del usuario
$dbname = "pizzeria_venecia";// Nombre de la base de datos

$proveedor = "proveedor"; 	   // tabla de usuarios

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>
