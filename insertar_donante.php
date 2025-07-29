<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $stmt = $pdo->prepare("INSERT INTO DONANTE (nombre, email, direccion, telefono) VALUES (?, ?, ?, ?)");
  $stmt->execute([
    $_POST['nombre'],
    $_POST['email'],
    $_POST['direccion'],
    $_POST['telefono']
  ]);
  echo "<p>Donante registrado.</p><a href='form_donante.html'>Volver</a>";
}
?>
