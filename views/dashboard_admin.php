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

        /* Scroll for sidebar */
        .sidebar {
            overflow-y: auto;
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
        <h2>Administrador</h2>
        <a href="dashboard_admin.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="#usuariosSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-users"></i> Gestión de Usuarios</a>
        <ul class="collapse list-unstyled" id="usuariosSubmenu">
          <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
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
            font-size: 15px;
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

        /* Scroll for sidebar */
        .sidebar {
            overflow-y: auto;
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
        <h2>Administrador</h2>
        <a href="dashboard_admin.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="#usuariosSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-users"></i> Gestión de Usuarios</a>
        <ul class="collapse list-unstyled" id="usuariosSubmenu">
          <li><a href="gestion/gestion_usuarios.php">Listar Usuarios</a></li>
           
        </ul>
        <a href="#librosSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-book"></i> Gestión de Libros</a>
        <ul class="collapse list-unstyled" id="librosSubmenu">
            <li><a href="crear_libro.php">Crear Libro</a></li>
            <li><a href="listar_libros.php">Listar Libros</a></li>
            <li><a href="eliminar_libro.php">Eliminar Libro</a></li>
        </ul>
        <a href="#matriculasSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-clipboard-list"></i> Gestión de Matrículas</a>
        <ul class="collapse list-unstyled" id="matriculasSubmenu">
            <li><a href="crear_matricula.php">Crear Matrícula</a></li>
          
        </ul>
        <a href="#cursosSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-graduation-cap"></i> Gestión de Cursos</a>
        <ul class="collapse list-unstyled" id="cursosSubmenu">
            <li><a href="crear_curso.php">Crear Curso</a></li>
            <li><a href="listar_cursos.php">Listar Cursos</a></li>
        </ul>
        <a href="gestionar_reportes.php"><i class="fas fa-chart-line"></i> Reportes</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <h2>Bienvenido al Dashboard del Administrador</h2>
        <p>Aquí podrás gestionar usuarios, libros, cursos, matrículas y más.</p>
        <!-- Aquí irán las demás funcionalidades del contenido principal -->
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</gestion/html>

           
          
        </ul>
        <a href="#librosSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-book"></i> Gestión de Libros</a>
        <ul class="collapse list-unstyled" id="librosSubmenu">
            <li><a href="gestion/gestion_libros.php">Crear Libro</a></li>
         
        </ul>
        <a href="#matriculasSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-clipboard-list"></i> Gestión de Matrículas</a>
        <ul class="collapse list-unstyled" id="matriculasSubmenu">
            <li><a href="gestion/gestion_matriculas.php">Crear Matrícula</a></li>
            <li><a href="listar_matriculas.php">Listar Matrículas</a></li>
        </ul>
        <a href="#cursosSubmenu" data-bs-toggle="collapse" class="dropdown-toggle"><i class="fas fa-graduation-cap"></i> Gestión de Cursos</a>
        <ul class="collapse list-unstyled" id="cursosSubmenu">
            <li><a href="crear_curso.php">Crear Curso</a></li>
            <li><a href="listar_cursos.php">Listar Cursos</a></li>
        </ul>
        <a href="gestionar_reportes.php"><i class="fas fa-chart-line"></i> Reportes</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <h2>Bienvenido al Dashboard del Administrador</h2>
        <p>Aquí podrás gestionar usuarios, libros, cursos, matrículas y más.</p>
        <!-- Aquí irán las demás funcionalidades del contenido principal -->
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
