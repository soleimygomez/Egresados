<?php

$_PAGE="Egresados";
$_TITLE="Reporte ".$_PAGE;

include_once "generico.php";
include_once "../../models/UsuarioModel.php";

$usuario= new UsuarioModel();
$egresados = $usuario->reportsEgresado($desdefecha, $hastafecha, 2);


$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY(60);
$pdf->SetX(10);
$pdf->Cell(15, 6, 'N.', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'NOMBRE', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'EMAIL ', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'TELEFONO', 1, 0, 'C', 1);
$pdf->Cell(5, 6, 'A', 1, 0, 'C', 1);
$pdf->Cell(15, 6, 'CODIGO', 1, 1, 'C', 1);


$pdf->SetFont('Arial', '', 8);
$i=1;
foreach ($egresados as $row) {

	if($i%32==0){
		$pdf->nuevaPagina();
		$pdf->agregarTitulo($_TITLE);
	    $pdf->SetFont('Arial', '', 8);
		$pdf->SetY(50);
		$pdf->SetX(10);
	}

	$pdf->Cell(25);
	$pdf->setX(10);
	$pdf->Cell(15, 6, $i.'.', 1, 0, 'C', 1);
	$pdf->Cell(70, 6, $row->nombre. " " . $row->apellido, 1, 0, 'C');
	$pdf->Cell(70, 6, $row->email, 1, 0, 'C');
	$pdf->Cell(20, 6, $row->telefono, 1, 0, 'C');
	$pdf->Cell(5, 6, $row->actualizado, 1, 0, 'C');
	$pdf->Cell(15, 6, $row->codigo, 1, 1, 'C');
	$i++;
}

$pdf->Close();
$pdf->Output('I',$_PAGE.'.pdf');
