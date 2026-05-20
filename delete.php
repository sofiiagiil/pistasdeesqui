<?php
require 'conexion.php';

// Capturar el ID del alquiler que queremos borrar
if (isset($_GET['id'])) {
    $id_alquiler = $_GET['id'];
    
    $sql = "DELETE FROM alquiler WHERE Id_alquiler = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_alquiler]);
}

// Redirigir de vuelta al panel principal de inmediato
header("Location: show.php");
exit;
?>