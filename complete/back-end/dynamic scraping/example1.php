<?php

namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

$host = 'http://localhost:9515';
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get('https://tracking.dpd.de/status/en_US/parcel/02655043535547');
$historyButton = $driver->findElement(
    WebDriverBy::className('popin_tc_privacy_button_3')
);

$historyButton->click();
echo $driver->getPageSource();
//$driver->quit();
//foreach ($data as $data){
//    echo "<pre>";
//    print_r($data);
//    echo "</pre>";
//}

