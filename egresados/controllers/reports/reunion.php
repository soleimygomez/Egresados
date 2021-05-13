<?php

$_PAGE="Reuniones";
$_TITLE="Reporte ".$_PAGE;

include_once "generico.php";
include_once "../../models/ReunionModel.php";

$reunion = new ReunionModel();
$reuniones= $reunion->reportsReunion($desdefecha, $hastafecha);

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY(60);
$pdf->SetX(10);
$pdf->Cell(15, 6, 'N.', 1, 0, 'C', 1);
$pdf->Cell(60, 6, 'TEMA', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'CUPOS', 1, 0, 'C', 1);
$pdf->Cell(60, 6, 'LUGAR', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'FECHA', 1, 1, 'C', 1);


$pdf->SetFont('Arial', '', 8);
$i=1;
foreach ($reuniones as $row) {
	if($i%32==0){
		$pdf->nuevaPagina();
		$pdf->agregarTitulo($_TITLE);
	    $pdf->SetFont('Arial', '', 8);
		$pdf->SetY(50);
		$pdf->SetX(10);
	}

	$pdf->Cell(20);
	$pdf->setX(10);
	$pdf->Cell(15, 6, $i.'.', 1, 0, 'C', 1);
	$pdf->Cell(60, 6, $row->tema, 1, 0, 'C');
	$pdf->Cell(30, 6,  $row->cupo_disponible.' / '.$row->cupo, 1, 0, 'C');
	$pdf->Cell(60, 6, $row->lugar, 1, 0, 'C');
	$pdf->Cell(30, 6, $row->fecha, 1, 1, 'C');
	$i++;
}

$pdf->Close();
$pdf->Output('I',$_PAGE.'.pdf');
