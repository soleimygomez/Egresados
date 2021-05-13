<?php

$_PAGE="Encuestas";
$_TITLE="Reportes ".$_PAGE;

include_once "generico.php";
include_once "../db/Connection.php";
include_once "../../models/Encuesta.php";

$desdefecha     =  $_POST['desdefecha'];
$hastafecha     =  $_POST['hastafecha'];

$encuestas = Encuesta::reportsEncuesta($desdefecha, $hastafecha);

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY(50);
$pdf->SetX(10);
$pdf->Cell(15, 6, 'N.', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'TEMA', 1, 0, 'C', 1);
$pdf->Cell(90, 6, 'URL', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'FECHA ', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$i=1;
foreach ($encuestas as $row) {

	if($i%33==0){
		$pdf->nuevaPagina();
		$pdf->agregarTitulo($_TITLE);
	    $pdf->SetFont('Arial', '', 8);
		$pdf->SetY(50);
		$pdf->SetX(10);
	}

	$pdf->Cell(20);
	$pdf->setX(10);
	$pdf->Cell(15, 6, $i.'.', 1, 0, 'C', 1);
	$pdf->Cell(70, 6, $row->getTema(), 1, 0, 'C');
	$pdf->Cell(90, 6, $row->getUrl(), 1, 0, 'C');
	$pdf->Cell(20, 6, $row->getFecha(), 1, 1, 'C');
	$i++;
}

$pdf->Close();
$pdf->Output('I',$_PAGE.'.pdf');
