<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado y tiene el rol de administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Estilos personalizados para el dashboard */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c3e50;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ecf0f1;
            display: block;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .sidebar a.active {
            background-color: #1abc9c;
        }

        h1 {
            text-align: center;
        }

        .card {
            margin: 20px 0;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center py-3">Administrador</h2>
        <a href="dashboard_admin.php" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="gestion/gestion_usuarios.php"><i class="fas fa-users"></i> Gestión de Usuarios</a>
        <a href="gestion/gestion_libros.php"><i class="fas fa-book"></i> Gestión de Libros</a>
        <a href="gestion/gestion_matriculas.php"><i class="fas fa-clipboard-list"></i> Gestión de Matrículas</a>
        <a href="gestion/gestion_cursos.php"><i class="fas fa-graduation-cap"></i> Gestión de Cursos</a>
        <a href="gestion/gestion_actividades.php"><i class="fas fa-tasks"></i> Gestión de Actividades</a>
        <a href="gestion/reportes.php"><i class="fas fa-chart-line"></i> Reportes</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <h1>Bienvenido, Administrador</h1>
        <p>Aquí puedes gestionar usuarios, libros, matrículas, cursos y más.</p>

        <!-- Panel de resumen o secciones adicionales -->
        <div class="card">
            <h3>Usuarios registrados</h3>
            <p>Visualiza y gestiona todos los usuarios registrados en la plataforma.</p>
        </div>

        <div class="card">
            <h3>Libros</h3>
            <p>Gestiona los libros asignados a los estudiantes y disponibles en el sistema.</p>
        </div>

        <div class="card">
            <h3>Matrículas</h3>
            <p>Accede a la gestión de matrículas y asignación de cursos a los estudiantes.</p>
        </div>

        <div class="card">
            <h3>Reportes</h3>
            <p>Genera reportes de actividades, usuarios, y rendimiento académico.</p>
        </div>
    </div>
</div>

</body>
</html>
