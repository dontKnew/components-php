<?php
$exportData = array(
    array("sajid", "rahul", "kamina", "address"),
    array("John", "Doe", "Example Co.", "123 Main St."),
    array("John", "Doe", "Example Co.", "123 Main St."),
    array("John", "Doe", "Example Co.", "123 Main St."),
    array("John", "Doe", "Example Co.", "123 Main St.")
);

header("Content-Disposition: attachment; filename=\"demo.csv\"");
header("Content-Type: text/csv;");
header("Pragma: no-cache");
header("Expires: 0");

$out = fopen("php://output", 'w');
foreach ($exportData as $row) {
    fputcsv($out, $row);
}
fclose($out);