<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

$id = $_GET['id'];
$matricula = $conn->query("SELECT * FROM matriculas WHERE id=$id")->fetch_assoc();

$estudiantes = $conn->query("SELECT id, nombre FROM usuarios WHERE rol='Estudiante'");
$libros = $conn->query("SELECT id, titulo FROM libros");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $libro_id = $_POST['libro_id'];

    $conn->query("UPDATE matriculas SET usuario_id='$usuario_id', libro_id='$libro_id' WHERE id=$id");
    header("Location: gestion_matriculas.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Matrícula</h1>
        <form method="POST" action="editar_matricula.php?id=<?= $id ?>">
            <div class="mb-3">
                <label for="usuario_id" class="form-label">Estudiante</label>
                <select class="form-select" id="usuario_id" name="usuario_id" required>
                    <?php while ($row = $estudiantes->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $matricula['usuario_id'] ? 'selected' : '' ?>>
                            <?= $row['nombre'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="libro_id" class="form-label">Libro</label>
                <select class="form-select" id="libro_id" name="libro_id" required>
                    <?php while ($row = $libros->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $matricula['libro_id'] ? 'selected' : '' ?>>
                            <?= $row['titulo'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>

        <a href="gestion_matriculas.php" class="btn btn-secondary mt-3">Volver a Gestión de Matrículas</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
