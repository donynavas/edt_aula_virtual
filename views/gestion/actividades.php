<?php
include '../../config/db.php'; // Asegúrate de tener la conexión a la base de datos

// Obtener el ID del curso
$curso_id = $_GET['curso_id'];

// Consultar las actividades del curso
$query = "SELECT * FROM actividades WHERE curso_id = $curso_id";
$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Actividades del Curso</h1>
        <a href="crear_actividad.php?curso_id=<?php echo $curso_id; ?>" class="btn btn-primary">Crear Actividad</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Entrega</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['fecha_entrega']; ?></td>
                    <td>
                        <a href="editar_actividad.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="eliminar_actividad.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta actividad?')">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
