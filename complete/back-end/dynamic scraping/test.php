<?php

namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

$host = 'http://localhost:9515'; // chrome driver port

$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get('https://rapidexworldwide.com'); // website url which you want to crawl dynamically

echo "The title is '" . $driver->getTitle() . "'\n <br>"; // print title of the current page to output

// print URL of current page to output
echo "The current URL is '" . $driver->getCurrentURL() . "'\n";

$driver->quit();
