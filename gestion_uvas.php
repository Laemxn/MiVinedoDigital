<?php
session_start();
require 'config/db.php';
include 'partials/navbar.php';
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$stmt = $pdo->prepare("SELECT * FROM uvas WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$uvas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Tipos de Uva - Mi Viñedo Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fondo de pantalla */
        body {
            background-image: url('images/uva.jpg'); /* Ruta de la imagen */
            background-size: cover; /* Asegura que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-attachment: fixed; /* Fija la imagen de fondo */
            margin: 0;
            padding: 0;
            height: 100vh; /* Asegura que el fondo cubra toda la altura */
        }

        /* Estilo adicional para el contenedor */
        .container {
            background-color: rgba(255, 255, 255, 0.85); /* Fondo blanco con algo de opacidad */
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Gestionar Tipos de Uva</h2>
        <a href="nueva_uva.php" class="btn btn-success mb-3">Añadir Nueva Uva</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de Plantación</th>
                    <th>Cuidados</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uvas as $uva): ?>
                    <tr>
                        <td><?= htmlspecialchars($uva['nombre']) ?></td>
                        <td><?= htmlspecialchars($uva['fecha_plantacion']) ?></td>
                        <td><?= htmlspecialchars($uva['cuidados']) ?></td>
                        <td>
                            <a href="editar_uva.php?id=<?= $uva['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_uva.php?id=<?= $uva['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta uva?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
