<?php
include '../../config/db.php';
$id = $_GET['id'];

$query = "DELETE FROM matriculas WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: gestion_matriculas.php");
?>
