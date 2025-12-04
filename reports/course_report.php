<?php
require '../includes/db.php';
require '../fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, "Course List Report", 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 10, "ID", 1);
$pdf->Cell(40, 10, "Code", 1);
$pdf->Cell(90, 10, "Title", 1);
$pdf->Cell(30, 10, "Credits", 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 11);
$result = $conn->query("SELECT * FROM courses");

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20, 10, $row['id'], 1);
    $pdf->Cell(40, 10, $row['code'], 1);
    $pdf->Cell(90, 10, $row['title'], 1);
    $pdf->Cell(30, 10, $row['credits'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>
