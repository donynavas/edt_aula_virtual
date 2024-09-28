<?php
include '../../config/db.php';
$id = $_GET['id'];

$query = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: gestion_usuarios.php");
?>
