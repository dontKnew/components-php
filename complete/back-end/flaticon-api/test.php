
<?php
//success this function

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
try {
    $client = new Client();
    $response = $client->request('GET', 'https://www.flipkart.com/search?q=laptop&sort=price_desc');
    
    $bodyPage = $response->getBody()->getContents();
    $doc = new DOMDocument();
    @$doc->loadHTML($bodyPage);
    $xpath = new DOMXPath($doc);
    
    // Find all elements with class 'icon--holder'
    $iconHolders = $xpath->query("//div[@class='CXW8mj']");

     $product_info = [];
	$i = 0;
    	foreach ($iconHolders as $iconHolder) {
        	$imgTag = $iconHolder->getElementsByTagName('img')->item(0);
	        $src = $imgTag->getAttribute('src');
		$product_info[$i]['image'] = $src;
$i++;
	    }
	
	$iconHolders = $xpath->query("//div[@class='_4rR01T']");
	$k = 0;
    	foreach ($iconHolders as $title) {
		$product_info[$k]['title'] = $title->textContent;
	$k++;
	    }

echo "<pre>";
print_r($product_info);
echo "</pre>";
} catch(Exception $e) {
    echo $e->getMessage();
}
?>
