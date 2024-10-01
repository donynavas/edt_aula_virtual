<?php
session_start();

// Verificar si el usuario ha iniciado sesión y es administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}


include '../../config/db.php';

// Verificar si se ha enviado un ID de usuario válido
if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];

    // Obtener los datos del usuario desde la base de datos
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    header("Location: gestion_usuarios.php");
    exit;
}

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];


    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE usuarios SET nombre = ?, email = ?, rol = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $email, $rol, $usuario_id);

    if ($stmt->execute()) {
        header("Location: gestion_usuarios.php?msg=Usuario actualizado exitosamente");
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Editar Usuario</h1>
        
        <form action="" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="estudiante" <?php if ($usuario['rol'] == 'estudiante') echo 'selected'; ?>>Estudiante</option>
                    <option value="profesor" <?php if ($usuario['rol'] == 'profesor') echo 'selected'; ?>>Profesor</option>
                    <option value="Administrador" <?php if ($usuario['rol'] == 'Administrador') echo 'selected'; ?>>Administrador</option>
                </select>
            </div>
           
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
