<?php 
include ("Finalresult.php");
require("fpdf/fpdf.php");

$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 40);
$pdf->Cell(0, 140, 'Select Template and Retry.', 0, 0, 'C');

// Output the PDF to the browser as a download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="doc.pdf"');
$pdf->Output();
?>