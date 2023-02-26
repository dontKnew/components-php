<?php
require_once  "vendor/autoload.php";

$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get('https://www.frontierforce.com/');
echo $response->getBody();
$htmlString = (string) $response->getBody();
//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);

/*EXRACT BOOK TITLE*/
/*$titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
$extractedTitles = [];
foreach ($titles as $title) {
    $extractedTitles[] = $title->textContent.PHP_EOL;
    echo $title->textContent.PHP_EOL;
}*/

/*EXTRACT PRICE*/
//titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
/*$prices = $xpath->evaluate('//ol[@class="row"]//li//article//div[@class="product_price"]//p[@class="price_color"]');
foreach ($titles as $key => $title) {
    echo $title->textContent . ' @ '. $prices[$key]->textContent.PHP_EOL;
}*/

/*EXTRACT BOTH PRICE AND TITLE*/
//$titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
//$prices = $xpath->evaluate('//ol[@class="row"]//li//article//div[@class="product_price"]//p[@class="price_color"]');
//foreach ($titles as $key => $title) {
//    echo "<br>";
//    echo  "Book Name : ".str_replace("...", " ", $title->textContent) . ' <br> Price : '. $prices[$key]->textContent.PHP_EOL;
//    echo "<br> <br>";
//
//}
