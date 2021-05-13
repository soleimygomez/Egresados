<?php

$_PAGE="Ofertas Empleo";
$_TITLE="Reporte ".$_PAGE;

include_once "generico.php";
include_once "../../models/Oferta.php";

$ofertas = Oferta::reportsOferta($desdefecha, $hastafecha);


$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 8);

$pdf->SetY(50);
$pdf->SetX(10);
$pdf->Cell(15, 6, 'N.', 1, 0, 'C', 1);
$pdf->Cell(60, 6, 'EMPRESA', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'UBICACION', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'CARGO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'VANCATES', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'FECHA', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$i=1;
foreach ($ofertas as $row) {

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
	$pdf->Cell(60, 6, $row->getEmpresa(), 1, 0, 'C');
	$pdf->Cell(50, 6, $row->getUbicacion(), 1, 0, 'C');
	$pdf->Cell(30, 6, $row->getCargo(), 1, 0, 'C');
	$pdf->Cell(20, 6, $row->getVacantes(), 1, 0, 'C');
	$pdf->Cell(20, 6, $row->getFecha(), 1, 1, 'C');
	$i++;
}

$pdf->Close();
$pdf->Output('I',$_PAGE.'.pdf'); 
