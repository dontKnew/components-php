<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', 'Hello World !');
$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
