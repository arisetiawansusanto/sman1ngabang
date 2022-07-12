<?php 

    require('fpdf.php');

    $pdf=new FPDF();

    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', '16');

    $pdf->Cell(100, 20, 'TEST', 'C');

    $pdf->Output();
?>