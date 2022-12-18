<?php

/*
 * @author Balaji
 * @name: AtoZ SEO Tools v2 - PHP Script
 * @copyright 2020 ProThemes.Biz
 *
 */

function googleCSEQueryCheck($searchQuery,$domain='com') {
    
    $apiKey = 'AIzaSyCVAXiUzRYsML1Pv6RwSG1gunmMikTzQqY';
    $lang = 'en';
    $cx = '017909049407101904515:7faowvtrjra';
    $cseToken = 'AOdTmaAgBfC0e4NzLUq4uUtQOC4I957X6w:1520511712122'; //Update
    $googleDomain = 'www.google.'.$domain;
    $apiary = rand(400,499);
    $sigRnd = rand(10,50);
    //$searchQuery = urlencode($searchQuery);

    $url = 'https://www.googleapis.com/customsearch/v1element?key='.$apiKey.'&rsz=filtered_cse&num=10&hl='.$lang.
    '&prettyPrint=false&source=gcsc&gss=.'.$domain.'&sig='.$sigRnd.'68fa9a9824ad4f837cbd399d21811d&cx='.$cx.'&q='.$searchQuery.'&cse_tok='.$cseToken.'&sort=&googlehost='.$googleDomain.'&oq='.$searchQuery.'&gs_l=partner-generic.3...3755.4403.0.5029.6.5.0.0.0.0.489.909.1j3j4-1.5.0.gsnos%2Cn%3D13...0.625j94185j6..1ac.1.25.partner-generic..6.0.0.pUwvdJkFQA8&callback=google.search.Search.apiary19'.$apiary;
    
    $data = curlGET($url);
    $data = explode('google.search.Search.apiary19'.$apiary.'(',$data);
    $data = explode(');',$data[1]);
    $data = $data[0];
    $data = json_decode($data, true);
    $dataRes = $data['cursor']['estimatedResultCount'];
    if ($dataRes == '')
        return false;
    if($dataRes == 0)
        return false;
    
    return true;
}
