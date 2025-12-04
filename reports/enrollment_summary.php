<?php
require '../includes/db.php';
require '../fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, "Enrollment Summary Report", 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 10, "Course", 1);
$pdf->Cell(50, 10, "Total Enrolled", 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 11);

$query = "
    SELECT courses.title AS course_name,
           COUNT(enrollments.id) AS total
    FROM courses
    LEFT JOIN enrollments ON courses.id = enrollments.course_id
    GROUP BY courses.id
";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(100, 10, $row['course_name'], 1);
    $pdf->Cell(50, 10, $row['total'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>
