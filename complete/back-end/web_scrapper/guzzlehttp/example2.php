<?php
require_once  "vendor/autoload.php";


try {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://books.toscrape.com');

    $status = $response->getStatusCode(); // 200
    //echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
    //echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
    // Send an asynchronous request.
    $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
    $promise = $client->sendAsync($request)->then(function ($response) {

    });
    $promise->wait();
    $htmlString = (string)$response->getBody();
//add this line to suppress any warnings
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML($htmlString);
    $xpath = new DOMXPath($doc);

    /*EXTRACT BOTH PRICE AND TITLE*/
    $titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
    $prices = $xpath->evaluate('//ol[@class="row"]//li//article//div[@class="product_price"]//p[@class="price_color"]');
    foreach ($titles as $key => $title) {
        echo "<br>";
        echo  "Book Name : ".str_replace("...", " ", $title->textContent) . ' <br> Price : '. $prices[$key]->textContent.PHP_EOL;
        echo "<br> <br>";

    }

}catch (Exception $e){
    if($e->getCode()==404){
        echo "Page not found";
    }
}
