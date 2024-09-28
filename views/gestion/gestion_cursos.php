<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Profesor') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

// Obtener cursos del profesor
$profesor_id = $_SESSION['usuario_id'];
$result = $conn->query("SELECT * FROM cursos WHERE profesor_id = $profesor_id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Gestión de Cursos</h1>
        <a href="agregar_curso.php" class="btn btn-primary mb-3">Agregar Curso</a>
        
        <!-- Tabla de cursos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nombre']; ?></td>
                    <td><?= $row['descripcion']; ?></td>
                    <td>
                        <a href="editar_curso.php?id=<?= $row['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="gestion_cursos.php?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este curso?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="dashboard_profesor.php" class="btn btn-secondary">Volver al Dashboard</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Eliminar curso si se solicita
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM cursos WHERE id = $id");
    header("Location: gestion_cursos.php");
}
?>
