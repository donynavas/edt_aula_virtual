<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado y tiene el rol de profesor

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Profesor') {
    header("Location: login.php");
    exit;
}

// Incluir la conexión a la base de datos


// Aquí puedes añadir más lógica si es necesario
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Profesor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            transition: all 0.3s;
        }

        .sidebar a {
            padding: 15px;
            font-size: 18px;
            color: #fff;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background-color: #007bff;
            text-decoration: none;
        }

        .sidebar .active {
            background-color: #007bff;
            color: white;
        }

        .sidebar h2 {
            color: #fff;
            text-align: center;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .dropdown-toggle::after {
            display: none;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                padding-top: 10px;
            }

            .sidebar a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Profesor</h2>
        <a href="dashboard_profesor.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="#cursosSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-book"></i> Cursos</a>
        <ul class="collapse list-unstyled" id="cursosSubmenu">
            <li>
                <a href="crear_curso.php">Crear Curso</a>
            </li>
            <li>
                <a href="listar_cursos.php">Listar Cursos</a>
            </li>
            <li>
                <a href="eliminar_curso.php">Eliminar Curso</a>
            </li>
        </ul>
        <a href="#actividadesSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-tasks"></i> Actividades</a>
        <ul class="collapse list-unstyled" id="actividadesSubmenu">
            <li>
                <a href="crear_actividad.php">Crear Actividad</a>
            </li>
            <li>
                <a href="listar_actividades.php">Listar Actividades</a>
            </li>
            <li>
                <a href="calificar_actividades.php">Calificar Actividades</a>
            </li>
        </ul>
        <a href="gestionar_mensajes.php"><i class="fas fa-envelope"></i> Mensajes</a>
        <a href="gestionar_perfil.php"><i class="fas fa-user"></i> Mi Perfil</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <h2>Bienvenido al Dashboard del Profesor</h2>
        <p>Aquí podrás gestionar tus cursos, actividades y más.</p>
        <!-- Aquí irán las demás funcionalidades -->
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
