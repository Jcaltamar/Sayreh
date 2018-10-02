<?php

include("../../libraries/tcpdf/font/times.php"); //fpdf
$this->load->library('fpdf'); //fpdf

$nombre="";






$fpdf = new FPDF();

ob_end_clean();
//inicializa pagina pdf
$fpdf->Open();
$fpdf->AddPage();
$fpdf->SetAuthor("codigoweblibre.comli.co - codigoweblibre.wordpress.com", true);
$fpdf->SetCreator("codigoweblibre.comli.co - codigoweblibre.wordpress.com", true);

//Cabecera
$fpdf->SetFont('Arial', '', 17);
$fpdf->SetTextColor("244", "8", "8"); //rojo
//$fpdf->Image(base_url() . 'img/User.png', 10, 10, -100);
$fpdf->SetFontSize(17);
$fpdf->Cell(0, 6, 'Reporte de Usuarios', 0, 1, 'C');
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
/*foreach ($usuarios as $valor) {
    $nombre = $valor->nombres . " " . $valor->apellidos;
    $fpdf->SetTitle("Reporte: ".$nombre, true);
    $fpdf->SetFontSize(12);
    $fpdf->SetTextColor("85", "78", "78"); //gris
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "Codigo: ", 0);
    $fpdf->SetFont('Arial', '', 12);
	$fpdf->Cell(0, 5,  $valor->codigo, 0);

    $fpdf->Ln();
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "Nombres y Apellidos: ", 0);
    $fpdf->SetFont('Arial', '', 12);    
    $fpdf->Cell(0, 5, utf8_decode(ucwords($nombre)), 0);
    $fpdf->Ln();
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "Fecha Nacimiento: ", 0);
    $fpdf->SetFont('Arial', '', 12);
    $fpdf->Cell(0, 5, $valor->telefono, 0);
    $fpdf->Ln();
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "EPS: ", 0);
    $fpdf->SetFont('Arial', '', 12);
    $fpdf->Cell(0, 5, utf8_decode($valor->ciudad), 0);  
	$fpdf->Ln();$fpdf->Ln();
    $fpdf->PageNo();
    
}
*/
//finaliza y muestra en pantalla pdf
$fpdf->Output($nombre.".pdf","I");
?>
