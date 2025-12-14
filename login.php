<?php
// 1. INICIAR LA SESIÓN DE PHP
session_start(); 

// Si el usuario ya tiene una sesión activa, lo mandamos a la página principal
if (isset($_SESSION['usuario_id'])) {
    header("Location: camaraswed.php"); // Asegúrate de que este es el nombre de tu archivo HOME
    exit();
}

include "db.php";

// Solo procesar si se envió el formulario (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta de selección con sentencias preparadas
    $sql = "SELECT id, nombre, email, password FROM usuarios WHERE email = ?"; 
    // NOTA: Asegúrate de que las columnas 'id', 'nombre', 'email', 'password' existan en tu tabla 'usuarios'.
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // 2. Verificar la contraseña cifrada
        if (password_verify($password, $user['password'])) {
            
            // --- CAMBIO CLAVE: Creación de Sesión ---
            // 3. Establecer las variables de sesión para el usuario logueado
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            $_SESSION['usuario_email'] = $user['email'];
            
            // 4. Redirigir a la página principal después de un inicio exitoso
            header("Location: camaraswed.php"); 
            exit(); 
        } else {
            // Contraseña incorrecta
            $error_message = "Contraseña incorrecta"; 
        }
    } else {
        // Usuario no encontrado
        $error_message = "Usuario no encontrado"; 
    }
    
    $stmt->close();
    $conn->close();
}

// Aquí iría tu HTML del formulario de login
?>

<?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>