<?php
include('conexion.php');
$estudiante_id = 1; // ID del estudiante actual, debe ser dinámico

$sql = "SELECT c.nombre_curso, c.descripcion 
        FROM cursos c 
        INNER JOIN inscripciones i ON c.id = i.curso_id 
        WHERE i.estudiante_id = '$estudiante_id'";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr><th>Nombre del Curso</th><th>Descripción</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['nombre_curso'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No estás inscrito en ningún curso.";
}
?>
