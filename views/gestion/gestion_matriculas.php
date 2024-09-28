<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

// Eliminar matrícula
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM matriculas WHERE id=$id");
    header("Location: gestion_matriculas.php");
}

// Obtener matrículas
$query = "SELECT matriculas.id, usuarios.nombre AS estudiante, libros.titulo AS libro 
          FROM matriculas 
          JOIN usuarios ON matriculas.usuario_id = usuarios.id 
          JOIN libros ON matriculas.libro_id = libros.id";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Matrículas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Gestión de Matrículas</h1>
        <a href="agregar_matricula.php" class="btn btn-primary mb-3">Agregar Matrícula</a>
        
        <!-- Tabla de matrículas -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Libro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['estudiante']; ?></td>
                    <td><?= $row['libro']; ?></td>
                    <td>
                        <a href="editar_matricula.php?id=<?= $row['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="gestion_matriculas.php?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta matrícula?');">Eliminar</a>
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
