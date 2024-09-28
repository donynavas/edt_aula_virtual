<?php
include '../../config/db.php'; // Asegúrate de tener un archivo para la conexión a la base de datos

// Consultar los cursos
$query = "SELECT cursos.id, cursos.nombre, usuarios.nombre AS profesor FROM cursos
          LEFT JOIN usuarios ON cursos.profesor_id = usuarios.id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Añade el camino a Bootstrap -->
</head>
<body>
    <div class="container">
        <h1>Lista de Cursos</h1>
        <a href="crear_curso.php" class="btn btn-primary">Crear Curso</a>
        <a href="../dashboard_admin.php" class="btn btn-secondary">Volver al Dashboard</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Curso</th>
                    <th>Profesor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['profesor']; ?></td>
                    <td>
                        <a href="editar_curso.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="eliminar_curso.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
