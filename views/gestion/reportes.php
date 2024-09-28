<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generación de Reportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Generación de Reportes</h1>
        <div>
            <a href="reporte_usuarios.php" class="btn btn-primary">Generar Reporte de Usuarios</a>
            <a href="reporte_libros.php" class="btn btn-primary">Generar Reporte de Libros</a>
            <a href="reporte_matriculas.php" class="btn btn-primary">Generar Reporte de Matrículas</a>
        </div>
        <a href="../dashboard_admin.php" class="btn btn-secondary mt-3">Volver al Dashboard</a>
    </div>
</body>
</html>
