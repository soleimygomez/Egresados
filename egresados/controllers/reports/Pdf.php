<?php

require 'fpdf/fpdf.php';

class Pdf extends FPDF
{

  public function header()
  {
    $this->SetFont('Arial', 'B', 13);
	  $this->SetX(32);
    $this->Cell(80, 10, "Universidad Francisco de Paula Santander", 0, 0);
    $this->Image('imagen\ufps.png', 10, 8, 20, 20, 'png');
  }

  public function footer()
  {
    $this->SetFont('Arial', 'B', 10);
    $this->SetY(-15);
    $this->Write(5, date('d-m-Y'). utf8_decode(' Cucúta,Colombia '));
    $this->SetX(-22);
    $this->AliasNbPages();
    $this->Write(5, $this->PageNo() . '/{nb}');
  }

  public function agregarTitulo($value)
  {
    $this->SetFont('Arial', 'B', 18);
    $this->SetY(40);
    $this->Cell(0,5,$value,0,0,'C');
  }

  public function nuevaPagina(){
    $this->AddPage('portrait', 'LETTER');
  }
}
