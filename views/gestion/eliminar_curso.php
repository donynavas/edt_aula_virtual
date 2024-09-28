<?php
include '../../config/db.php'; // Asegúrate de tener la conexión a la base de datos

// Obtener el ID del curso
$id = $_GET['id'];

// Eliminar el curso
$query = "DELETE FROM cursos WHERE id = $id";
if ($conn->query($query)) {
    header('Location: cursos.php');
    exit;
} else {
    echo "Error al eliminar el curso: " . $conexion->error;
}
?>
