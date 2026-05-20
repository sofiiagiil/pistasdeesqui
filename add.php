<?php
require 'conexion.php';

// 1. Cargar todos los esquiadores para el desplegable
$esquiadores = $pdo->query("SELECT Id_esquiador, Nombre, Apellido FROM esquiador")->fetchAll();

// 2. Cargar todos los materiales para el desplegable
$materiales = $pdo->query("SELECT Id_material, Talla FROM material")->fetchAll();

// 3. Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_esquiador = $_POST['id_esquiador'];
    $id_material = $_POST['id_material'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    if (!empty($id_esquiador) && !empty($id_material) && !empty($fecha_inicio)) {
        $sql = "INSERT INTO alquiler (Id_esquiador, Id_material, Fecha_inicio, Fecha_fin) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_esquiador, $id_material, $fecha_inicio, $fecha_fin]);
        
        // Volver al listado principal
        header("Location: show.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Alquiler</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f7f9; margin: 40px; }
        .form-container { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        h2 { color: #2c3e50; margin-bottom: 20px; }
        label { display: block; margin-top: 15px; font-weight: 600; color: #34495e; }
        select, input { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-submit { background: #3498db; color: white; border: none; margin-top: 25px; cursor: pointer; font-weight: bold; font-size: 16px; }
        .btn-submit:hover { background: #2980b9; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #7f8c8d; text-decoration: none; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>📝 Nuevo Alquiler de Material</h2>
        <form method="POST">
            <label for="id_esquiador">Selecciona el Esquiador (Cliente):</label>
            <select name="id_esquiador" id_esquiador required>
                <option value="">-- Elige un cliente --</option>
                <?php foreach ($esquiadores as $e): ?>
                    <option value="<?= $e['Id_esquiador'] ?>"><?= htmlspecialchars($e['Nombre'] . " " . $e['Apellido']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="id_material">Selecciona el Material (Talla):</label>
            <select name="id_material" id_material required>
                <option value="">-- Elige un equipo --</option>
                <?php foreach ($materiales as $m): ?>
                    <option value="<?= $m['Id_material'] ?>">Material Talla: <?= htmlspecialchars($m['Talla']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" value="2026-02-15T09:00" required>

            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="datetime-local" name="fecha_fin" id="fecha_fin" value="2026-02-15T18:00">

            <button type="submit" class="btn-submit">Guardar Registro de Alquiler</button>
        </form>
        <a href="show.php" class="back-link">Volver al panel</a>
    </div>

</body>
</html>