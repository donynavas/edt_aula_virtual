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
    <title>Sidebar Profesional</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding: 10px 0;
            overflow-y: auto;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #007bff;
            text-decoration: none;
        }
        .sidebar .active {
            background-color: #007bff;
            color: white;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar h2 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
        }
        .dropdown-menu {
            background-color: #343a40;
            border: none;
        }
        .dropdown-menu a {
            padding-left: 40px;
        }
        .dropdown-menu a:hover {
            background-color: #007bff;
        }
        .sidebar .dropdown-toggle::after {
            display: none;
            margin-left: 10px;
            vertical-align: 0.255em;
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }
        .sidebar .dropdown-item:hover {
            color: white;
        }
        .sidebar a:focus, .sidebar a.active {
            background-color: #0056b3;
            color: white;
        }

        /* Scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.6);
        }

        /* Main content area */
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Administrador</h2>
    <a href="dashboard_admin.php" class="active"><i class="fas fa-home"></i> Dashboard</a>
    
    <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#gestionUsuariosMenu" aria-expanded="false">
        <i class="fas fa-users"></i> Gestión de Usuarios
    </a>
    <div class="collapse" id="gestionUsuariosMenu">
     
        <a href="gestion/agregar_usuario.php" class="dropdown-item">Crear Usuario</a>
    </div>

    <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#gestionCursosMenu" aria-expanded="false">
        <i class="fas fa-graduation-cap"></i> Gestión de Cursos
    </a>
    <div class="collapse" id="gestionCursosMenu">
       <a href="gestion/gestion_cursos.php" class="dropdown-item">Crear Curso</a>
    </div>

    <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#gestionLibrosMenu" aria-expanded="false">
        <i class="fas fa-book"></i> Gestión de Libros
    </a>
    <div class="collapse" id="gestionLibrosMenu">
  
        <a href="gestion/gestion_libros.php" class="dropdown-item">Crear Libro</a>
    </div>

    <a href="reportes.php"><i class="fas fa-chart-line"></i> Reportes</a>
    <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
</div>

<div class="main-content">
    <h1>Bienvenido al Dashboard del Administrador</h1>
    <p>Este es el área principal del administrador. Aquí puede gestionar usuarios, cursos, libros y reportes.</p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
