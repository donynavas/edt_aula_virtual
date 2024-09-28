<?php
include '../../config/db.php';
$id = $_GET['id'];

$query = "DELETE FROM libros WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: gestion_libros.php");
?>
