<?php require 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Donación</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="container">
  <h2>Registrar Donación</h2>
  <form action="insertar_donacion.php" method="post">
    <label>Monto:</label>
    <input type="number" name="monto" required>
    <label>Fecha:</label>
    <input type="date" name="fecha" required>
    <label>Proyecto:</label>
    <select name="id_proyecto">
      <?php
      $res = $pdo->query("SELECT id_proyecto, nombre FROM PROYECTO");
      foreach ($res as $row) {
        echo "<option value='{$row['id_proyecto']}'>{$row['nombre']}</option>";
      }
      ?>
    </select>
    <label>Donante:</label>
    <select name="id_donante">
      <?php
      $res = $pdo->query("SELECT id_donante, nombre FROM DONANTE");
      foreach ($res as $row) {
        echo "<option value='{$row['id_donante']}'>{$row['nombre']}</option>";
      }
      ?>
    </select>
    <input type="submit" value="Registrar Donación">
  </form>
</div>
</body>
</html