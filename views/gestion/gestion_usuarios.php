<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

// Eliminar usuario
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM usuarios WHERE id=$id");
    header("Location: gestion_usuarios.php");
}

// Obtener usuarios
$result = $conn->query("SELECT * FROM usuarios");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Gestión de Usuarios</h1>
        <a href="agregar_usuario.php" class="btn btn-primary mb-3">Agregar Usuario</a>
        
        <!-- Tabla de usuarios -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nombre']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['rol']; ?></td>
                    <td>
                        <a href="editar_usuario.php?id=<?= $row['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="gestion_usuarios.php?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="../dashboard_admin.php" class="btn btn-secondary">Volver al Dashboard</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>