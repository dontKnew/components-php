<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$html = '
    <table style="width:55%;margin:0 auto;text-align:left;border-collapse:collapse">
           <thead>
            <tr>
            <td colspan="2" style="background-color:#0661b0;text-align:center;padding:10px;color:white;border:1px solid grey;font-weight:800;font-size:20px">Measurement Form</td>
            </tr>';
            $row = array();
                 foreach($row as $k=>$f) {
                     if($k!=='created_at' && $k!=='updated_at' && $k!=='id'){
                        echo '
                        <tr style="padding:10px">
                            <th style="border:1px solid grey;padding:10px">'.str_replace("_", " ", strtoupper($k)).'</th>
                            <td style="border:1px solid grey;padding:10px">'.$f.'</td>
                        </tr>';
                     }
                }
            echo '</thead>
        </table>
        <footer style="margin-top:5px; text-align: center">
        <span style="text-align: center">https://mauliuniforms.com/</span>
    </footer>';
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream();

array_slice()