<?php
include('../../config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $curso_id = $_POST['curso_id'];
    $estudiante_id = $_POST['estudiante_id'];

    $sql = "INSERT INTO inscripciones (curso_id, estudiante_id) 
            VALUES ('$curso_id', '$estudiante_id')";

    if (mysqli_query($conexion, $sql)) {
        echo "Inscripción realizada exitosamente.";
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<form method="POST" action="inscribir_curso.php">
    <label for="curso_id">ID del Curso:</label>
    <input type="text" id="curso_id" name="curso_id" required><br>

    <label for="estudiante_id">ID del Estudiante:</label>
    <input type="text" id="estudiante_id" name="estudiante_id" required><br>

    <input type="submit" value="Inscribirse">
</form>
