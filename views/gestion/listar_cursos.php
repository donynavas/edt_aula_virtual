<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Incluir la conexión a la base de datos
include '../../config/db.php';

// Consulta para obtener todos los cursos
$sql = "SELECT * FROM cursos";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Cursos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Administrador</h2>
        <a href="dashboard_admin.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="listar_cursos.php" class="active"><i class="fas fa-book"></i> Listar Cursos</a>
        <a href="crear_curso.php"><i class="fas fa-plus-circle"></i> Crear Curso</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <h1 class="text-center">Lista de Cursos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Curso</th>
                    <th>Descripción</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre_curso']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="editar_curso.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="eliminar_curso.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este curso?');">
                                    <i class="fas fa-trash"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron cursos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
