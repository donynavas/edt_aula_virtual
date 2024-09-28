<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';
require '../../vendor/autoload.php'; // Asegúrate de tener la librería TCPDF instalada

$pdf = new \TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Reporte de Usuarios', 0, 1, 'C');

// Obtener todos los usuarios
$query = "SELECT * FROM usuarios";
$result = $conn->query($query);
$html = '<table border="1" cellpadding="5"><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th></tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['rol'] . '</td>
              </tr>';
}
$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('reporte_usuarios.pdf', 'D');
?>
