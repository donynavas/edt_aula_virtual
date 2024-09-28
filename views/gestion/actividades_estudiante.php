<?php
include '../../config/db.php'; // Asegúrate de tener la conexión a la base de datos

// Obtener el ID del estudiante y los cursos asignados
$estudiante_id = $_SESSION['usuario_id']; // Supongo que tienes la sesión activa
$query_cursos = "SELECT c.nombre AS curso, a.nombre AS actividad, a.descripcion, a.fecha_entrega 
                 FROM actividades a
                 INNER JOIN matriculas m ON a.curso_id = m.curso_id
                 INNER JOIN cursos c ON c.id = a.curso_id
                 WHERE m.estudiante_id = $estudiante_id";
$result = $conexion->query($query_cursos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Añade el camino a Bootstrap -->
</head>
<body>
    <div class="container">
        <h1>Mis Actividades</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Actividad</th>
                    <th>Descripción</th>
                    <th>Fecha de Entrega</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['curso']; ?></td>
                    <td><?php echo $row['actividad']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['fecha_entrega']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
