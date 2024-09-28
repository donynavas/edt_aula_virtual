<?php
include '../../config/db.php';// Asegúrate de tener la conexión a la base de datos

// Obtener el ID de la actividad y el ID del estudiante desde la sesión
$actividad_id = $_GET['actividad_id'];
$estudiante_id = $_SESSION['usuario_id']; // Supongo que tienes la sesión activa

// Consultar detalles de la actividad
$query = "SELECT * FROM actividades WHERE id = $actividad_id";
$result = $conexion->query($query);
$actividad = $result->fetch_assoc();

// Procesar la entrega del archivo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploads/";
    $file_name = basename($_FILES["archivo"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Limitar los tipos de archivos permitidos
    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        echo "Solo se permiten archivos PDF, DOC o DOCX.";
        $uploadOk = 0;
    }

    // Verificar si todo está bien para subir el archivo
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            // Guardar la entrega en la base de datos
            $query_insert = "INSERT INTO entregas (actividad_id, estudiante_id, archivo, fecha_entrega)
                             VALUES ($actividad_id, $estudiante_id, '$file_name', NOW())";
            if ($conexion->query($query_insert)) {
                echo "La entrega se realizó con éxito.";
            } else {
                echo "Error al guardar la entrega: " . $conexion->error;
            }
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Entregar Actividad</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1>Entregar Actividad: <?php echo $actividad['nombre']; ?></h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="archivo">Subir archivo (PDF, DOC, DOCX):</label>
                <input type="file" class="form-control" id="archivo" name="archivo" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
    </div>
</body>
</html>
