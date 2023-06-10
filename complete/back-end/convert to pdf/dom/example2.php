<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$html = file_get_contents("invoice.html");
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream();