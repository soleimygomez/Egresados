<?php 

include 'Pdf.php';
include_once "../libs/Base.php";

/**
 * Obtenemos Valores
 */
$desdefecha     =  $_POST['desdefecha'];
$hastafecha     =  $_POST['hastafecha'];

/**
 * Inicializamos
 */
$pdf = new PDF();
$pdf->AddPage('portrait', 'LETTER');
$pdf->agregarTitulo($_TITLE);




