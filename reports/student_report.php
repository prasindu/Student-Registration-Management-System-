<?php
require '../includes/db.php';
require '../fpdf/fpdf.php';

// PDF setup
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, "Student List Report", 0, 1, 'C');
$pdf->Ln(5);

// Table Header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, "ID", 1);
$pdf->Cell(50, 10, "Name", 1);
$pdf->Cell(15, 10, "Age", 1);
$pdf->Cell(25, 10, "Gender", 1);
$pdf->Cell(35, 10, "Contact", 1);
$pdf->Cell(55, 10, "Address", 1);
$pdf->Ln();

// Fetch data
$pdf->SetFont('Arial', '', 11);
$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 10, $row['id'], 1);
    $pdf->Cell(50, 10, $row['name'], 1);
    $pdf->Cell(15, 10, $row['age'], 1);
    $pdf->Cell(25, 10, $row['gender'], 1);
    $pdf->Cell(35, 10, $row['contact'], 1);
    $pdf->Cell(55, 10, $row['address'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>
