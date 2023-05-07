<?php

require_once('vendor/autoload.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetMargins(5, 5, 5);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->AddPage();
$html = file_get_contents('invoice.html');

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('example_two_invoice2.pdf', 'I');