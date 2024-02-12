<?php
require_once 'vendor/autoload.php';

use MaxMind\Db\Reader;

$ipAddress = '152.58.93.148';
$databaseFile = __DIR__.'/lib/GeoLite2-City.mmdb';

$reader = new Reader($databaseFile);

$record = $reader->get($ipAddress);
// echo "<pre>";
// // get returns just the record for the IP address
// print_r($record);
// // getWithPrefixLen returns an array containing the record and the
// // associated prefix length for that record.
// print_r($reader->getWithPrefixLen($ipAddress));
// echo "</pre>";

 // Print out the location information
 echo 'Country: ' . $record->country->name . '<br>';
 echo 'City: ' . $record->city->name . '<br>';
 echo 'Latitude: ' . $record->location->latitude . '<br>';
 echo 'Longitude: ' . $record->location->longitude . '<br>';
$reader->close();