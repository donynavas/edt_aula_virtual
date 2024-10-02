<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Profesor') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';

// Eliminar libro
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM cursos WHERE id=$id");
    header("Location: ../login.php");
}

// Obtener libros
$result = $conn->query("SELECT * FROM libros");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cursos</title>
  
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
                        <a class="btn btn-success" href="../dashboard_profesor.php">Volver al Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>GESTIÓN DE CURSOS</h1>
        <a href="agregar_curso.php" class="btn btn-primary mb-3">Agregar Curso</a>
        
        <!-- Tabla de cursos -->
        <table id="tablaUsuarios" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nombre']; ?></td>
                    <td><?= $row['descripcion']; ?></td>
                    <td>
                        <a href="editar_curso.php?id=<?= $row['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="gestion_cursos.php?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este curso?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#tablaUsuarios').DataTable({
            "paging": true,           // Habilitar la paginación
            "lengthChange": true,      // Permitir al usuario cambiar el número de registros mostrados
            "searching": true,         // Habilitar búsqueda
            "ordering": true,          // Habilitar la ordenación de columnas
            "info": true,              // Mostrar información sobre la tabla (ej. "Mostrando 1 a 10 de 57 registros")
            "autoWidth": false,        // Deshabilitar ajuste automático de ancho
            "pageLength": 10,          // Número de registros mostrados por página (puedes cambiarlo)
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"  // Traducción al español
            }
        });
    });
</script>
</body>
</html>

<?php
// Eliminar curso si se solicita
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM cursos WHERE id = $id");
    header("Location: gestion_cursos.php");
}
?>
