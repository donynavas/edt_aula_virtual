<?php

include '../../config/db.php'; // Asegúrate de tener la conexión a la base de datos

// Obtener el ID del curso
$curso_id = $_GET['curso_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha_entrega = $_POST['fecha_entrega'];

    // Insertar actividad
    $query = "INSERT INTO actividades (nombre, descripcion, fecha_entrega, curso_id) 
              VALUES ('$nombre', '$descripcion', '$fecha_entrega', $curso_id)";
    if ($conexion->query($query)) {
        header("Location: actividades.php?curso_id=$curso_id");
        exit;
    } else {
        echo "Error al crear actividad: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Actividad</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>CREAR ACTIVIDAD</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre de la Actividad</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha_entrega">Fecha de Entrega</label>
                <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Actividad</button>
        </form>
    </div>
</body>
</html>
