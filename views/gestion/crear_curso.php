<?php
include '../../config/db.php'; // Asegúrate de que la conexión esté configurada

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $profesor_id = $_POST['profesor_id'];

    // Insertar curso
    $query = "INSERT INTO cursos (nombre, descripcion, profesor_id) VALUES ('$nombre', '$descripcion', $profesor_id)";
    if ($conn->query($query)) {
        header('Location: cursos.php');
        exit;
    } else {
        echo "Error al crear curso: " . $conexion->error;
    }
}

// Obtener lista de profesores
$query_profesores = "SELECT id, nombre FROM usuarios WHERE rol = 'Profesor'";
$result_profesores = $conn->query($query_profesores);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Curso</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre del Curso</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="form-group">
                <label for="profesor_id">Profesor</label>
                <select class="form-control" id="profesor_id" name="profesor_id" required>
                    <option value="">Seleccione un Profesor</option>
                    <?php while ($profesor = $result_profesores->fetch_assoc()) { ?>
                    <option value="<?php echo $profesor['id']; ?>"><?php echo $profesor['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Curso</button>
            <a href="../dashboard_admin.php" class="btn btn-secondary">Volver al Dashboard</a>
        </form>
    </div>
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
