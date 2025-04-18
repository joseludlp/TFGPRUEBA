<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($id, $hash);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["usuario"] = $usuario;
        header("Location: index.php");
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<h2>Iniciar sesión</h2>
<form method="POST">
  Usuario: <input type="text" name="usuario" required><br>
  Contraseña: <input type="password" name="password" required><br>
  <button type="submit">Entrar</button>
</form>
