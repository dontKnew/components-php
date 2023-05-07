<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// Create new spreadsheet
$spreadsheet = new Spreadsheet();

// Set active sheet
$sheet = $spreadsheet->getActiveSheet();

// Set header row
$header = ['Name', 'Age', 'Gender'];
$sheet->fromArray($header, null, 'A1');
$sheet->getStyle('A1:C1')->getFont()->setBold(true);
$sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:C1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('2c3e50');
$sheet->getStyle('A1:C1')->getFont()->getColor()->setRGB('FFFFFF');

// Set data rows
$data = [
    ['John Doe', 30, 'Male'],
    ['Jane Doe', 25, 'Female'],
    ['Bob Smith', 40, 'Male'],
    ['Alice Johnson', 35, 'Female'],
];
$sheet->fromArray($data, null, 'A2');
$sheet->getStyle('A2:C5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Auto size columns
foreach(range('A', 'C') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}

// Save file
$writer = new Xlsx($spreadsheet);
$writer->save('table.xlsx');
