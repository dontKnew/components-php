<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once 'vendor/autoload.php';

// Set the URL of the ChromeDriver server
$chromeDriverUrl = 'http://localhost:9515';

// Set the desired capabilities for the ChromeDriver
$capabilities = DesiredCapabilities::chrome();

// Create a new instance of the ChromeDriver
$driver = RemoteWebDriver::create($chromeDriverUrl, $capabilities);

// Navigate to a web page
$driver->get('https://www.google.com');

// Print the page title
echo 'Page title: ' . $driver->getTitle() . PHP_EOL;

// Find the search input field and enter a query
$searchInput = $driver->findElement(\Facebook\WebDriver\WebDriverBy::name('q'));
$searchInput->sendKeys('Chocolatey');

// Submit the search form
$searchInput->submit();

// Wait for the search results to load
$driver->wait(10)->until(
    \Facebook\WebDriver\WebDriverExpectedCondition::titleContains('Chocolatey')
);

// Print the page title again (should be the search results page)
echo 'Page title: ' . $driver->getTitle() . PHP_EOL;

// Print the search results count
$resultsCount = $driver->findElement(\Facebook\WebDriver\WebDriverBy::id('result-stats'))->getText();
echo 'Search results: ' . $resultsCount . PHP_EOL;

// Quit the driver
$driver->quit();
