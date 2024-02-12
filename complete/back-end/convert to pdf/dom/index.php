<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

$html = file_get_contents('https://www.shipmiles.com//admin/order/invoice/CA3B5A24?box_no=1');
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("hello.pdf", ['Attachment' => false]);