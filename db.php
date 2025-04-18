<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "miweb";
$port = 3307; 

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
