<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $usuario = trim($_POST["usuario"]);
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Comprobar si ya existe
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ? OR usuario = ?");
    $stmt->bind_param("ss", $correo, $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Correo o usuario ya registrado.";
    } else {
        $stmt = $conn->prepare("INSERT INTO usuarios (correo, usuario, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $correo, $usuario, $hash);
        if ($stmt->execute()) {
            echo "Usuario registrado correctamente. <a href='login.php'>Inicia sesión</a>";
        } else {
            echo "Error al registrar usuario.";
        }
    }
}
?>

<h2>Registro</h2>
<form method="POST">
  Correo: <input type="email" name="correo" required><br>
  Usuario: <input type="text" name="usuario" required><br>
  Contraseña: <input type="password" name="password" required><br>
  <button type="submit">Registrarse</button>
</form>
