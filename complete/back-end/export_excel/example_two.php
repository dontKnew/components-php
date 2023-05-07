<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;

// Create new spreadsheet
$spreadsheet = new Spreadsheet();

// Set active sheet
$sheet = $spreadsheet->getActiveSheet();

// Set header row
$header = ['Name', 'Age', 'Gender'];
$sheet->fromArray($header, null, 'A2');
$sheet->getStyle('A2:C2')->getFont()->setBold(true);
$sheet->getStyle('A2:C2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Set data rows
$data = [
    ['John Doe', 30, 'Male'],
    ['Jane Doe', 25, 'Female'],
    ['Bob Smith', 40, 'Male'],
    ['Alice Johnson', 35, 'Female'],
];
$sheet->fromArray($data, null, 'A3');

// Auto size columns
foreach(range('A', 'C') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}

// Save file
$writer = new Xlsx($spreadsheet);
$writer->save('table.xlsx');
