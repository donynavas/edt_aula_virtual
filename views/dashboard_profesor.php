<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado y tiene el rol de profesor
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] != 'profesor') {
    header("Location: login.php");
    exit;
}

// Incluir la conexión a la base de datos
include '../../config/db.php';

// Aquí puedes añadir más lógica si es necesario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Profesor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Estilos personalizados para el dashboard */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center py-3">Profesor</h2>
        <a href="dashboard_profesor.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="gestion_cursos.php"><i class="fas fa-book"></i> Gestión de Cursos</a>
        <a href="crear_actividad.php"><i class="fas fa-tasks"></i> Crear Actividades</a>
        <a href="listar_actividades.php"><i class="fas fa-tasks"></i> Ver Actividades</a>
        <a href="calificar_actividades.php"><i class="fas fa-check"></i> Calificar Actividades</a>
        <a href="mensajes_profesor.php"><i class="fas fa-envelope"></i> Mensajes</a>
        <a href="gestionar_notas.php"><i class="fas fa-chart-bar"></i> Gestión de Notas</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <h1 class="text-center">Bienvenido, Profesor</h1>
        <p class="text-center">Aquí podrás gestionar tus cursos, actividades y calificaciones.</p>

        <!-- Puedes agregar secciones o paneles adicionales -->
        <div class="card">
            <h3>Tus cursos activos</h3>
            <p>Aquí aparecerá una lista de los cursos que estás gestionando actualmente.</p>
        </div>

        <div class="card">
            <h3>Actividades pendientes</h3>
            <p>Aquí podrás ver las actividades pendientes de calificar o revisar.</p>
        </div>
    </div>
</div>

</body>
</html>

<?php
// Cerrar la conexión a la base de datos si es necesario
$conn->close();
?>
