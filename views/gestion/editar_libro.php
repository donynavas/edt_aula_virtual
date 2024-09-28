<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

$id = $_GET['id'];
$libro = $conn->query("SELECT * FROM libros WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $url = $_POST['url'];

    $conn->query("UPDATE libros SET titulo='$titulo', autor='$autor', url='$url' WHERE id=$id");
    header("Location: gestion_libros.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Libro</h1>
        <form method="POST" action="editar_libro.php?id=<?= $id ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $libro['titulo'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" value="<?= $libro['autor'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="url" class="form-control" id="url" name="url" value="<?= $libro['url'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>

        <a href="gestion_libros.php" class="btn btn-secondary mt-3">Volver a Gestión de Libros</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
