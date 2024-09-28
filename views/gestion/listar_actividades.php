<?php
// Conexión a la base de datos
include('conexion.php');

// Seleccionar todas las actividades
$sql = "SELECT * FROM actividades";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Descripción</th><th>Fecha Límite</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['fecha_limite'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay actividades disponibles.";
}
?>
