<?php

// call export function
exportMysqlToCsv('export_csv.csv');


// export csv
function exportMysqlToCsv($filename = 'export_csv.csv')
{

   $conn = dbConnection();
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql_query = "SELECT * FROM enquiry";

    // Gets the data from the database
    $result = $conn->query($sql_query);

    $f = fopen('php://temp', 'wt');
    $first = true;
    while ($row = $result->fetch_assoc()) {
        if ($first) {
            fputcsv($f, array_keys($row));
            $first = false;
        }
        fputcsv($f, $row);
    } // end while

    $conn->close();

    $size = ftell($f);
    rewind($f);

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Length: $size");
    // Output to browser with appropriate mime type, you choose ;)
    header("Content-type: text/x-csv");
    header("Content-type: text/csv");
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=$filename");
    fpassthru($f);
    exit;

}

// db connection function
function dbConnection(){
    $servername = "localhost";
    $username = "elect7wk_rapidexiwebs";
    $password = "HemantSohan@#321";
    $dbname = "elect7wk_rapidexiwebs";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}


?> 