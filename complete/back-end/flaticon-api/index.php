<style>
.im-border > img {
    border: 1px solid #eaeaea;
    padding: 8px;
    margin: 5px;
}
</style>
<?php
//success this function

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
try {
    $client = new Client();
    $searchTerm = 'laptop';
    $response = $client->request('GET', 'https://www.flaticon.com/search?word='.$_GET['term']);
    
    $bodyPage = $response->getBody()->getContents();
   
    $doc = new DOMDocument();
    @$doc->loadHTML($bodyPage);

    $xpath = new DOMXPath($doc);
    
    // Find all elements with class 'icon--holder'
    $iconHolders = $xpath->query("//div[@class='icon--holder']");

$srcArr = [];
echo '<div class="im-border">';
    foreach ($iconHolders as $iconHolder) {
        $imgTag = $iconHolder->getElementsByTagName('img')->item(0);
        $src = $imgTag->getAttribute('data-src');
	array_push($srcArr, $src);
	echo '<img src="'.$src.'" width="64" height="64" class="lzy">';
    }
echo"</div>";
} catch(Exception $e) {
    echo $e->getMessage();
}
?>

<?php

$folder = 'icons/'.strtolower($_GET['term']);
if (!file_exists($folder)) {
	mkdir($folder, 0755, true);
}
foreach($srcArr as $url){
	$filename = basename($url);
	$path = $folder . '/' . $filename;
	if(!file_exists($path)){
		file_put_contents($path, file_get_contents($url));
	}
	
}

?>
