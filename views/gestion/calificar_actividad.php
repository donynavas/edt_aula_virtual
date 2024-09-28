<?php
include '../../config/db.php'; // Asegúrate de tener la conexión a la base de datos

// Obtener el ID de la actividad
$actividad_id = $_GET['actividad_id'];

// Consultar las entregas de los estudiantes
$query = "SELECT e.id AS entrega_id, u.nombre AS estudiante, e.archivo, e.fecha_entrega
          FROM entregas e
          INNER JOIN usuarios u ON e.estudiante_id = u.id
          WHERE e.actividad_id = $actividad_id";
$result = $conexion->query($query);

// Procesar la calificación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entrega_id = $_POST['entrega_id'];
    $calificacion = $_POST['calificacion'];

    // Actualizar la calificación en la base de datos
    $query_update = "UPDATE entregas SET calificacion = '$calificacion' WHERE id = $entrega_id";
    if ($conexion->query($query_update)) {
        echo "Calificación guardada correctamente.";
    } else {
        echo "Error al guardar la calificación: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calificar Actividad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Calificar Actividad</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Archivo</th>
                    <th>Fecha de Entrega</th>
                    <th>Calificación</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['estudiante']; ?></td>
                    <td><a href="uploads/<?php echo $row['archivo']; ?>" target="_blank"><?php echo $row['archivo']; ?></a></td>
                    <td><?php echo $row['fecha_entrega']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="entrega_id" value="<?php echo $row['entrega_id']; ?>">
                            <input type="text" name="calificacion" class="form-control" placeholder="Calificación" required>
                    </td>
                    <td><button type="submit" class="btn btn-success">Guardar</button></form></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
