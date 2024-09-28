<?php
session_start();
include '../config/db.php';

// Procesar el login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['rol'] = $user['rol'];

            // Redirigir según el rol del usuario
            if ($user['rol'] === 'Estudiante') {
                header("Location: ../views/dashboard_estudiante.php");
            } elseif ($user['rol'] === 'Profesor') {
                header("Location: ../views/dashboard_profesor.php");
            } elseif ($user['rol'] === 'Administrador') {
                header("Location: ../views/dashboard_admin.php");
            }
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}

// Procesar el logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../views/login.php");
}
?>
