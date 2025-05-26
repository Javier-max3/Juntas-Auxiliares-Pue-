<?php
require('fpdf/fpdf.php');

// Crear una clase personalizada que extienda FPDF
class PDF extends FPDF
{
    function Header()
    {
        // Título del documento
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,'Instrucciones para Solicitar Informacion',0,1,'C');
        $this->Ln(10);
    }

    function Footer()
    {
        // Pie de página con número de página
        $this->SetY(-15);
        $this->SetFont('Arial','I',10);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Crear el PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

// Instrucciones
$pasos = [
    "1. Ingresa a la Plataforma Nacional de Transparencia.",
    "2. Haz clic en 'Solicita información'.",
    "3. Regístrate o inicia sesión con tu cuenta.",
    "4. Selecciona el sujeto obligado al que deseas hacer la solicitud (por ejemplo: Ayuntamiento de Puebla).",
    "5. Llena el formulario con los datos específicos que deseas solicitar.",
    "6. Envía la solicitud y guarda el folio para darle seguimiento.",
    "",
    "URL de la Plataforma Nacional de Transparencia:",
    "https://www.plataformadetransparencia.org.mx/"
];

// Agregar cada línea al PDF
foreach ($pasos as $linea) {
    $pdf->MultiCell(0, 10, utf8_decode($linea));
}

$pdf->Output('I', 'instrucciones_transparencia.pdf');
?>
