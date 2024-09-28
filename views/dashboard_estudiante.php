<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Estudiante') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenido, Estudiante</h1>
        <p>Aquí puedes ver tus libros asignados y actividades pendientes.</p>
        <!-- Aquí se mostrarán los libros asignados y las actividades -->
    </div>
</body>
</html>
