<?php
require '/controller/FpdfController.php';
         

$pdf = new FPDF();

// var_dump(get_class_methods($pfd));

$pdf->AddPage();

$pdf->SetFont("Arial", "B", 14);
$pdf->Cell(0,10, "First Name:");
$pdf->Output();






