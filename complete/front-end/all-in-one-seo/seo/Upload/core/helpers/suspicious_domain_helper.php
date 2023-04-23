<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
function updateSuspiciousDomains(){
    
    $fL = 'sp_low.tdata'; $fM = 'sp_medium.tdata'; $fH = 'sp_high.tdata';
    
    $l = 'https://secure.dshield.org/feeds/suspiciousdomains_Low.txt';
    $m = 'https://secure.dshield.org/feeds/suspiciousdomains_Medium.txt';
    $h = 'https://secure.dshield.org/feeds/suspiciousdomains_High.txt';

    $l = simpleCurlGET($l);
    if($l != '') putMyData(LIB_DIR.$fL, $l);
    
    $m = simpleCurlGET($m);
    if($m != '') putMyData(LIB_DIR.$fM, $m);
    
    $h = simpleCurlGET($h);
    if($h != '') putMyData(LIB_DIR.$fH, $h);
}

function checkDomain($domain){
    
    $domain = clean_url(trim($domain));
    $fL = 'sp_low.tdata'; $fM = 'sp_medium.tdata'; $fH = 'sp_high.tdata';
    
    $dbH = file(LIB_DIR.$fH);
    foreach($dbH as $domainName){
        $domainName = clean_url(trim($domainName));
        if($domainName == $domain) return 'h';
    }
        
    $dbM = file(LIB_DIR.$fM); 
    foreach($dbM as $domainName){
        $domainName = clean_url(trim($domainName));
        if($domainName == $domain) return 'm';
    }
    
    $dbL = file(LIB_DIR.$fL); 
    foreach($dbL as $domainName){
        $domainName = clean_url(trim($domainName));
        if($domainName == $domain) return 'l';
    }
    
    return 'n';
}

?>