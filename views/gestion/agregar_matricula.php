<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

$estudiantes = $conn->query("SELECT id, nombre FROM usuarios WHERE rol='Estudiante'");
$libros = $conn->query("SELECT id, titulo FROM libros");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $libro_id = $_POST['libro_id'];

    $conn->query("INSERT INTO matriculas (usuario_id, libro_id) VALUES ('$usuario_id', '$libro_id')");
    header("Location: gestion_matriculas.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mi Proyecto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="gestion_matriculas.php">Volver a Gestión Matricula</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Agregar Matrícula</h1>
        <form method="POST" action="agregar_matricula.php">
            <div class="mb-3">
                <label for="usuario_id" class="form-label">Estudiante</label>
                <select class="form-select" id="usuario_id" name="usuario_id" required>
                    <?php while ($row = $estudiantes->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="libro_id" class="form-label">Libro</label>
                <select class="form-select" id="libro_id" name="libro_id" required>
                    <?php while ($row = $libros->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['titulo'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Matrícula</button>
        </form>

    
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
