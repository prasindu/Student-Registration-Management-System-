<?php
require '../includes/db.php';
require '../fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, "Registration Report", 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, "Student", 1);
$pdf->Cell(90, 10, "Course", 1);
$pdf->Cell(40, 10, "Enrolled Date", 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 11);

$query = "
    SELECT students.name AS student_name,
           courses.title AS course_title,
           enrollments.enrolled_at
    FROM enrollments
    INNER JOIN students ON enrollments.student_id = students.id
    INNER JOIN courses ON enrollments.course_id = courses.id
";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['student_name'], 1);
    $pdf->Cell(90, 10, $row['course_title'], 1);
    $pdf->Cell(40, 10, $row['enrolled_at'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>
