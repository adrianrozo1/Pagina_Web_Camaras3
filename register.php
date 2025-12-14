<?php
include "db.php";

// 1. Asegurarse de que el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recoger los datos. Asumo que el formulario usa 'nombre', 'email', 'password'
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    
    // Cifrar la contraseña ANTES de guardarla
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Consulta de inserción con sentencias preparadas
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $password_hash);

    if ($stmt->execute()) {
        // --- CAMBIO CLAVE: Redirección ---
        // 2. Redirigir a login.php tras el registro exitoso
        header("Location: login.php?registro=exitoso");
        exit(); // Detener la ejecución del script
    } else {
        // Manejar errores de inserción (ej. email duplicado)
        // Podrías redirigir de vuelta al registro con un mensaje de error.
        echo "Error al registrar usuario: " . $stmt->error; 
    }
    $stmt->close();
} else {
    // Si no es un método POST, podrías cargar el formulario HTML.
    // O simplemente dejar que el resto del HTML de register.php se muestre.
}
?>