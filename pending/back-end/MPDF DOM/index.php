<?php
// require composer autoload
require __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
ob_start();
$html = file_get_contents("index.html");
ob_get_clean();
$mpdf = new \Mpdf\Mpdf();
$mpdf->useSubstitutions = true; // optional - just as an example
$mpdf->CSSselectMedia='mpdf'; // assuming you used this in the document header
$mpdf->setBasePath($url);
$mpdf->WriteHTML($html);
$mpdf->Output();
