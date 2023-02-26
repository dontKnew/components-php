<?php
# scraping books to scrape: https://books.toscrape.com/

require 'php_web_scraper/vendor/autoload.php';

use Symfony\Component\Panther\Client;
use Symfony\Component\Panther\DomCrawler\Crawler;

$url = "https://shopee.co.id/shop/127192295/search";

$client = Client::createChromeClient(null, ["port" => 9558]);    // create a chrome client

$crawler = $client->request('GET', $url);

$client->waitFor('.shopee-page-controller');                                         // wait for the element with this css class until appear in DOM

echo $crawler->filter('.shopee-page-controller')->text();

?>