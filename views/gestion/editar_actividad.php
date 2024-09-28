<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Profesor') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

$id = $_GET['id'];
$actividad = $conn->query("SELECT * FROM actividades WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $curso_id = $_POST['curso_id'];

    $conn->query("UPDATE actividades SET titulo='$titulo', descripcion='$descripcion', fecha_entrega='$fecha_entrega', curso_id='$curso_id' WHERE id=$id");
    header("Location: gestion_actividades.php");
}

// Obtener los cursos del profesor
$profesor_id = $_SESSION['usuario_id'];
$cursos = $conn->query("SELECT * FROM cursos WHERE profesor_id = $profesor_id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Actividad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Actividad</h1>
        <form method="POST" action="editar_actividad.php?id=<?= $id ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $actividad['titulo'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?= $actividad['descripcion'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha_entrega" class="form-label">Fecha de Entrega</label>
                <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" value="<?= $actividad['fecha_entrega'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select class="form-select" id="curso_id" name="curso_id" required>
                    <?php while ($row = $cursos->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $actividad['curso_id'] ? 'selected' : '' ?>>
                            <?= $row['nombre'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>

        <a href="gestion_actividades.php" class="btn btn-secondary mt-3">Volver a Gestión de Actividades</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
