<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Profesor') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

$id = $_GET['id'];
$curso = $conn->query("SELECT * FROM cursos WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $conn->query("UPDATE cursos SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id");
    header("Location: gestion_cursos.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Curso</h1>
        <form method="POST" action="editar_curso.php?id=<?= $id ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $curso['nombre'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?= $curso['descripcion'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>

        <a href="gestion_cursos.php" class="btn btn-secondary mt-3">Volver a Gestión de Cursos</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
