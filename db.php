<?php
// --- Configuraciones de la Base de Datos ---

// Servidor de la base de datos (copiado de la interfaz de Login)
$host = "camarasweb_camarabase"; 

// Nombre de la base de datos 
$db = "camarasweb";

// Nombre de usuario de MySQL (copiado de la interfaz de Login)
$user = "mysql";

// **IMPORTANTE**: Reemplaza 'TU_CONTRASEÑA_REAL' con la contraseña que tienes oculta
$pass = "TU_CONTRASEÑA_REAL"; 

// --- Establecer la Conexión ---
$conn = new mysqli($host, $user, $pass, $db);

// --- Verificación y Manejo de Errores ---
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer el juego de caracteres a UTF-8
$conn->set_charset("utf8");

// La conexión está lista en $conn.
?>