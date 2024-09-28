<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

// Eliminar libro
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM libros WHERE id=$id");
    header("Location: gestion_libros.php");
}

// Obtener libros
$result = $conn->query("SELECT * FROM libros");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Gestión de Libros</h1>
        <a href="agregar_libro.php" class="btn btn-primary mb-3">Agregar Libro</a>
        
        <!-- Tabla de libros -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>URL</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['titulo']; ?></td>
                    <td><?= $row['autor']; ?></td>
                    <td><a href="<?= $row['url']; ?>" target="_blank">Ver</a></td>
                    <td>
                        <a href="editar_libro.php?id=<?= $row['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="gestion_libros.php?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este libro?');">Eliminar</a>
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
