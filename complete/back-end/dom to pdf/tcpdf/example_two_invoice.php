<?php

require_once('vendor/autoload.php');
//content
$html = '
	<style>
	table, tr, td {
	padding: 15px;
	}
	</style>
	<table style="background-color: #222222; color: #fff">
	<tbody>
	<tr>
	<td><h1>INVOICE<strong> #1212122</strong></h1></td>
	<td align="right"><img src="data:image/jpeg;base64,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" height="60px"/><br/>

	123 street, ABC Store<br/>
	Country, State, 00000
	<br/>
	<strong>+00-1234567890</strong> | <strong>abc@xyz</strong>
	</td>
	
	</tr>
	</tbody>
	</table>
	';
$html .= '
	<table>
	<tbody>
	<tr>
	<td>Invoice to<br/>
	<strong>Sajid Ali</strong>
	<br/>
	123 street, ABC Store, New Delhi
	</td>
	<td align="right">
	<strong>Total Due: $4200</strong><br/>
	Tax ID: ABCDEFGHIJ12345<br/>
	Invoice Date: '.date('d-m-Y').'
	</td>
	</tr>
	</tbody>
	</table>
	';
$html .= '
	<table>
	<thead>
	<tr style="font-weight:bold;">
	<th>Item name</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>Total</th>
	</tr>
	</thead>
	<tbody>';
for($i = 0; $i <10; $i++)
{
    $each_item = "Biscut";
    $each_price = "100";
    $each_quantity = "2";
    $each_total = "200";
    $html .= '
		<tr>
		<td style="border-bottom: 1px solid #222">'.$each_item.'</td>
		<td style="border-bottom: 1px solid #222">$'.$each_price.'</td>
		<td style="border-bottom: 1px solid #222">'.$each_quantity.'</td>
		<td style="border-bottom: 1px solid #222">$'.$each_total.'</td>
		</tr>
		';
}
$html .='
	<tr align="right">
	<td colspan="4"><strong>Grand total: $1000</strong></td>
	</tr>
	<tr>
	<td colspan="4">
	<h2>Thank you for your business.</h2><br/>
	<strong>Terms and conditions:<br/></strong>
	Make it look like digital big boy pants we need to leverage our synergies. Digital literacy productize and fire up your browser fast track.
	</td>
	</tr>
	</tbody>
	</table>
	';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetMargins(-1, 0, -1);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFontSubsetting(true);
$pdf->AddPage();
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
$pdf_name = time().'.pdf';
$pdf->Output(dirname(__FILE__).'/invoice/'.$pdf_name.'', 'I');