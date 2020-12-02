<?php

require_once("public/fpdf/fpdf.php");


class PdfProformaController
{
    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function ejecutar()
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Cell(80);


        $pdf->Ln(20);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, utf8_decode('¡Hola, asdasdasdsaMundo!'), 0, 0, 'C');
        $pdf->Output();
    }
}