<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream();