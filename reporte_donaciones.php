<?php
require 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Donaciones</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="container">
  <h2>Reporte de Donaciones por Proyecto</h2>

  <table>
    <tr>
      <th>Proyecto</th>
      <th>Cantidad de Donaciones</th>
      <th>Total Recaudado</th>
    </tr>

    <?php
    $sql = "
      SELECT 
        p.nombre AS proyecto,
        COUNT(d.id_donacion) AS cantidad,
        SUM(d.monto) AS total
      FROM PROYECTO p
      JOIN DONACION d ON p.id_proyecto = d.id_proyecto
      GROUP BY p.id_proyecto
      HAVING cantidad >= 1
    ";

    $resultado = $pdo->query($sql);

    foreach ($resultado as $fila) {
      echo "<tr>
              <td>{$fila['proyecto']}</td>
              <td>{$fila['cantidad']}</td>
              <td>$" . number_format($fila['total'], 2) . "</td>
            </tr>";
    }
    ?>
  </table>

  <nav>
    <a href="index.php">Volver al inicio</a>
  </nav>
</div>
</body>
</html>
