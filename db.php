<?php
$host = "mysql-camaras"; // nombre del contenedor MySQL
$db   = "camarasweb";
$user = "camarauser";
$pass = "camara123";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
