<?php

require_once 'includes/classBD.php';

$conexion = new ConexionBD();
$pdo = $conexion->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    // Validar los datos
    if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO contactos (nombre, correo, asunto, mensaje) VALUES (:nombre, :correo, :asunto, :mensaje)";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta
    if ($stmt->execute([':nombre' => $nombre, ':correo' => $correo, ':mensaje' => $mensaje, ':asunto' => $asunto])) {
        header('Location: index.php?mensaje=ok');
    } else {
        echo "Error al enviar el mensaje.";
    }
}
