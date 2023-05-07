<?php

require_once('vendor/autoload.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sajid Ali');
$pdf->SetTitle('First PDf');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(5, 5, 5);
$pdf->SetFont('dejavusans', '', 10);
$pdf->AddPage();

/*// new style
$style = array(
    'border' => false,
    'padding' => 0,
    'fgcolor' => array(128,0,0),
    'bgcolor' => false
);
$pdf->write2DBarcode('Something information found here', 'QRCODE,H', 10, 10, 50, 50, $style, 'N');*/

// Define barcode parameters
$code = 'This is code value'; // Barcode value
$type = 'C39'; // Barcode type
$x = 50; // Barcode X position
$y = 50; // Barcode Y position
$w = 80; // Barcode width
$h = 20; // Barcode height
$color = array(0, 0, 0); // Barcode color
$bgcolor = false; // Background color
// Write barcode
$pdf->write1DBarcode($code, $type, $x, $y, $w, $h, $color, $bgcolor);
$pdf->Output('barcode.pdf', 'I');

/*
 1D Barcodes: Code 39, Code 39 Extended, Code 93, Code 93 Extended, Code 128 (A,B,C), EAN 8, EAN 13, EAN 128, Interleaved 2 of 5, MSI, PostNet, Codabar, UPC-A, UPC-E, UPC-A 2, UPC-A 5, UPC-E 2, UPC-E 5, Pharmacode, and many others.
 2D Barcodes: QR-Code, Data Matrix, PDF417, and many others.

check more type & detials of barcode : https://tcpdf.org/examples/example_050/

 */
