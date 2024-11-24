<?php
session_start();
require 'config/db.php';
include 'partials/navbar.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$stmt = $pdo->prepare("SELECT * FROM cosechas WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$cosechas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<style>
    body {
        background-image: url('images/cosechas.jpg'); /* Ruta de la imagen */
        background-size: cover; /* Asegura que la imagen cubra toda la pantalla */
        background-position: center; /* Centra la imagen */
        background-attachment: fixed; /* Fija la imagen de fondo */
        margin: 0;
        padding: 0;
        height: 100vh; /* Asegura que el fondo cubra toda la altura */
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>Gestionar Cosechas - Mi Viñedo Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2>Gestionar Cosechas</h2>
        <a href="nueva_cosecha.php" class="btn btn-success mb-3">Añadir Nueva Cosecha</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad (kg)</th>
                    <th>Parcela</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cosechas as $cosecha): ?>
                    <tr>
                        <td><?= htmlspecialchars($cosecha['fecha']) ?></td>
                        <td><?= htmlspecialchars($cosecha['cantidad']) ?></td>
                        <td><?= htmlspecialchars($cosecha['parcela_id']) ?></td>
                        <td>
                            <a href="editar_cosecha.php?id=<?= $cosecha['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_cosecha.php?id=<?= $cosecha['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta cosecha?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
