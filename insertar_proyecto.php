<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $stmt = $pdo->prepare("INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([
    $_POST['nombre'],
    $_POST['descripcion'],
    $_POST['presupuesto'],
    $_POST['fecha_inicio'],
    $_POST['fecha_fin']
  ]);
  echo "<p>Proyecto registrado.</p><a href='form_proyecto.html'>Volver</a>";
}
?>
