<?php
use setasign\Fpdi\Fpdi;
 
require_once('../fpdf.php');                     //j'ai modifié le chemin
require_once('../src_fpdfi/autoload.php');    //j'ai aussi modifié le chemin après avoir récupéré les fichiers à https://www.setasign.com/products/fpdi/downloads/
 
// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('un_pdf_a_moi.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 10, 10, 100);
 
// now write some text above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(255, 0, 0);
$pdf->SetXY(30, 30);
$pdf->Write(0, 'This is just a simple text');
 
$pdf->Output();