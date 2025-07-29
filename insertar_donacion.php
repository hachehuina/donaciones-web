<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $monto = floatval($_POST['monto']);
    $fecha = $_POST['fecha'];
    $id_proyecto = intval($_POST['id_proyecto']);
    $id_donante = intval($_POST['id_donante']);

    if ($monto <= 0) {
        echo "<p>Monto inválido.</p><a href='form_donacion.php'>Volver</a>";
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO DONACION (monto, fecha, id_proyecto, id_donante)
                           VALUES (?, ?, ?, ?)");
    $stmt->execute([$monto, $fecha, $id_proyecto, $id_donante]);

    echo "<p>Donación registrada correctamente.</p><a href='form_donacion.php'>Volver</a>";
}
?>
