<?php
$host = "localhost";
$db = "paola_montes_db2";
$user = "paola_montes";
$pass = "paola_montes2025";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
?>