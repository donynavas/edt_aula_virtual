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
$pdf->Cell(0, 10, 'Reporte de Libros', 0, 1, 'C');

$query = "SELECT * FROM libros";
$result = $conn->query($query);
$html = '<table border="1" cellpadding="5"><tr><th>ID</th><th>Título</th><th>Autor</th><th>URL</th></tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['titulo'] . '</td>
                <td>' . $row['autor'] . '</td>
                <td><a href="' . $row['url'] . '" target="_blank">Ver</a></td>
              </tr>';
}
$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('reporte_libros.pdf', 'D');
?>
