<?php
include '../../config/db.php'; // Asegúrate de tener la conexión a la base de datos

// Obtener el ID de la actividad
$id = $_GET['id'];

// Obtener el curso_id antes de eliminar para redirigir correctamente
$query_curso = "SELECT curso_id FROM actividades WHERE id = $id";
$result_curso = $conexion->query($query_curso);
$curso = $result_curso->fetch_assoc();

// Eliminar la actividad
$query_delete = "DELETE FROM actividades WHERE id = $id";
if ($conexion->query($query_delete)) {
    header("Location: actividades.php?curso_id=" . $curso['curso_id']);
    exit;
} else {
    echo "Error al eliminar la actividad: " . $conexion->error;
}
?>
