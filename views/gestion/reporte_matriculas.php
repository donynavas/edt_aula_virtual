<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

include '../../config/db.php';
require '../../vendor/autoload.php';

$pdf = new \TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Reporte de Matrículas', 0, 1, 'C');

$query = "SELECT matriculas.id, usuarios.nombre AS estudiante, libros.titulo AS libro 
          FROM matriculas 
          JOIN usuarios ON matriculas.usuario_id = usuarios.id 
          JOIN libros ON matriculas.libro_id = libros.id";
$result = $conn->query($query);
$html = '<table border="1" cellpadding="5"><tr><th>ID</th><th>Estudiante</th><th>Libro</th></tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['estudiante'] . '</td>
                <td>' . $row['libro'] . '</td>
              </tr>';
}
$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('reporte_matriculas.pdf', 'D');
?>
q