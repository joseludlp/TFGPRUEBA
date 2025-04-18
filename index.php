<?php
session_start();
?>

<h2>Bienvenido<?php echo isset($_SESSION["usuario"]) ? ', ' . htmlspecialchars($_SESSION["usuario"]) : ''; ?> 👋</h2>

<?php if (isset($_SESSION["user_id"])): ?>
  <p>Has iniciado sesión como <strong><?php echo htmlspecialchars($_SESSION["usuario"]); ?></strong></p>
  <a href="logout.php">Cerrar sesión</a>
<?php else: ?>
  <p>Estás navegando como <strong>anónimo</strong>.</p>
  <a href="login.php">Iniciar sesión</a> |
  <a href="register.php">Registrarse</a>
<?php endif; ?>

<hr>

<p>Este contenido es visible para todos los visitantes.</p>

<?php if (isset($_SESSION["user_id"])): ?>
  <p><a href="subir_partido.php">Subir partido</a> (solo usuarios registrados)</p>
<?php else: ?>
  <p><em>Para subir contenido o comentar, inicia sesión.</em></p>
<?php endif; ?>
