<?php
require 'conexion.php';

// Consulta INNER JOIN uniendo las 3 tablas con tus columnas reales
$sql = "SELECT alquiler.Id_alquiler, esquiador.Nombre, esquiador.Apellido, material.Talla, alquiler.Fecha_inicio
        FROM alquiler
        INNER JOIN esquiador ON alquiler.Id_esquiador = esquiador.Id_esquiador
        INNER JOIN material ON alquiler.Id_material = material.Id_material
        ORDER BY alquiler.Fecha_inicio DESC";

$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Alquileres - Estación de Esquí</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f7f9; margin: 40px; color: #333; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        h2 { color: #2c3e50; margin-bottom: 5px; }
        p { color: #7f8c8d; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e0e0e0; }
        th { background-color: #3498db; color: white; font-weight: 600; }
        tr:hover { background-color: #f9fbfd; }
        .btn { display: inline-block; padding: 10px 18px; background: #2ecc71; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-delete { background: #e74c3c; padding: 5px 10px; font-size: 13px; font-weight: normal; }
    </style>
</head>
<body>

    <div class="container">
        <h2>🎿 Panel de Control: Alquiler de Material</h2>
        <p>Mostrando la relación cruzada de Esquiadores y Equipamiento alquilado (Relación Muchos a Muchos)</p>
        
        <a href="add.php" class="btn">+ Registrar Nuevo Alquiler</a>
        
        <table>
            <tr>
                <th>Cliente / Esquiador</th>
                <th>Material Alquilado (Talla)</th>
                <th>Fecha de Inicio</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $stmt->fetch()): ?>
            <tr>
                <td><strong><?= htmlspecialchars($row['Nombre'] . " " . $row['Apellido']) ?></strong></td>
                <td>Equipamiento (<?= htmlspecialchars($row['Talla']) ?>)</td>
                <td><?= htmlspecialchars($row['Fecha_inicio']) ?></td>
                <td>
                    <a href="delete.php?id=<?= $row['Id_alquiler'] ?>" class="btn btn-delete" onclick="return confirm('¿Confirmar devolución y borrar alquiler?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>