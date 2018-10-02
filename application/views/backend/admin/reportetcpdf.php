<?php

include("../libraries/fonts/times.php"); //tcpdf
include("../libraries/config/lang/spa.php"); //tcpdf

$this->load->library('tcpdf'); //tcpdf

//*************
ob_end_clean(); //rompimiento de pagina
//*************




class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
		
        $imagen ='//localhost/sayreh/uploads/logo.png';
		$this->Image($imagen,5,5,40,20);
		
		$this->Cell(180,3,"CORPORACION AUTONOMA REGIONAL DE LA GUAJIRA",0,1,'C'); 
        $this->Cell(180,4,"DESPRENDIBLE DE PAGO",0,1,'C'); 

		// Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
 
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SAYREH');
$pdf->SetTitle('SISTEMA ADMINISTRATIVO Y RECURSOS HUMANOS');
$pdf->SetSubject('PDF');
$pdf->SetKeywords('Reporte, ESTUDIANTES');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set some language-dependent strings
//$pdf->setLanguageArray($l);
// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 8, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->setPrintHeader(true); //no imprime la cabecera ni la linea
$pdf->setPrintFooter(true); // imprime el pie ni la linea
$pdf->AddPage();

$this->db->order_by('P_CEDULA','CON_CODIGO','CON_TIPO');
$nomina = $this->db->get_where('cnomina', array('ANO' => '2018'))->result_array();
		
$empleado=0;
$tdevengado=0;
$tdeducido=0;
$sw=0;

$i = 0;
$tipo_documento = 0;


$pdf->Ln(5);

$tbl.='<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">';

/*<thead>
	 <tr style="color:#0000FF;"border=1>
		<td align="center"><strong></strong></td>
		<td align="center"><strong></strong></td>
		<td align="center"><strong></strong></td>
		<td align="center"><strong></strong></td>
		<td align="center"><strong></strong></td>
	 </tr>
</thead>
EOD;*/


foreach ($nomina as $nom)
	{	
	if ($empleado<>$nom[P_CEDULA])
		
		{
		$sw=1;	
		if ($empleado<>0 AND $sw=1) 
				{		
				/*$netopagar=$tdevengado-$tdeducido;		
				/*$nomsalud=$this->traer_nombrefondo($nom->EMP_SALUD);
			    $nompension=$this->traer_nombrefondo($nom->EMP_PENSION);
			    $nomcesantia=$this->traer_nombrefondo($nom->EMP_CESANTIA);*/
				$tbl.='
					<tr>
						<td align="center"><strong>...</strong></td>
						<td align="center"><strong>TOTALES</strong></td>
						<td align="right"><strong>'.number_format($tdevengado,0,'.',',').'</strong></td>
						<td align="right"><strong>'.number_format($tdeducido,0,'.',',').'</strong></td>
						<td align="center"><strong>....</strong></td>
					</tr>
					<tr><td></td></tr>
				    <tr><td></td></tr>
				    <tr><td></td></tr>
					</table>
					<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">';
			
				$sw=0;
				

				}	
		}
		
	else	
		{
			if ($nom[CON_TIPO]=='DEVENGADO')
				{
				 $tbl.='
					<tr>
						<td align="center">'.$nom[CON_CODIGO_CONCEPTO].'</td>
						<td>'.$nom[CON_NOMBRE].'</td>
						<td align="right">'.number_format($nom[VALOR_CONCEPTO],0,'.',',').'</td>
						<td align="right">'.'0'.'</td>
						<td align="center">'.$nom[DIAS_TRABAJADOS].'</td>
					</tr>';
					$tdevengado=$tdevengado+$nom[VALOR_CONCEPTO];
				}	

			 
			if ($nom[CON_TIPO]=='DEDUCIDO')
				{
					$tbl.='
						<tr>
							<td align="center">'.$nom[CON_CODIGO_CONCEPTO].'</td>
							<td>'.$nom[CON_NOMBRE].'</td>
							<td align="right">'.'0'.'</td>
							<td align="right">'.number_format($nom[VALOR_CONCEPTO],0,'.',',').'</td>
							<td align="center">'.$nom[DIAS_TRABAJADOS].'</td>
						</tr>';
						$tdeducido=$tdeducido+$nom[VALOR_CONCEPTO];
				}		
			}
		$empleado=$nom[P_CEDULA];
		
	}
 $tbl.='</table>';
 $pdf->writeHTML($tbl, true, false, false, false, '');	
//$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
$pdf->Output('Reporte.pdf', 'I');
?>