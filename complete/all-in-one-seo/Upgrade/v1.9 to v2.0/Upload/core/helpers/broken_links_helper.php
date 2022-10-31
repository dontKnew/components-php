<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
function getBrokenLinks($my_url,$unknown="Unknown"){

//Parse Host
$inputUrl = parse_url($my_url);
$inputHost = $inputUrl['scheme'] . "://" . $inputUrl['host'];
    
$uriData = doLinkAnalysis($my_url);	
if(!is_array($uriData))
    return false;
$internal_links = $uriData[0];
$external_links = $uriData[3];

$iLinks = array();
$eLinks = array();

foreach($internal_links as $internal_link){
    
        $iLink = Trim($internal_link['href']);
        
        if(substr($iLink, 0, 2) == "//") {
        $iLink = "http:" . $iLink;
        }
        elseif(substr($iLink, 0, 1) == "/") {
        $iLink = $inputHost . $iLink;
        }
        $httpCode = Trim(getHttp(getHeaders($iLink)));
        
        if($httpCode=="")
        $httpCode = $unknown;
        
        if($httpCode == 200)
        $colorCode = "#27ae60";
        elseif($httpCode == 404)
        $colorCode = "#cd4031";
        else
        $colorCode = "#16a085";
        
        $iLinks[] = array($iLink,$httpCode,$colorCode);
}

foreach($external_links as $external_link){
    $eLink = Trim($external_link['href']);
    
    $httpCode = Trim(getHttp(getHeaders($eLink)));
    
    if($httpCode=="")
    $httpCode = $unknown;  
        
    if($httpCode == 200)
    $colorCode = "#27ae60";
    elseif($httpCode == 404)
    $colorCode = "#cd4031";
    else
    $colorCode = "#16a085";
        
    $eLinks[] = array($eLink,$httpCode,$colorCode);
}

return array($iLinks,$eLinks);
}
?>