<?php
// Sustituye estos valores por los de tus imágenes
$host = "sql308.infinityfree.com"; 
$user = "if0_41969008";                    
$pass = "Sofiagil0809";    
$db   = "if0_41969008_pistasesqui";        


try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "¡Conexión exitosa!";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>