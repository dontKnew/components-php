<?php

/*
* @author Balaji
* @name AtoZ SEO Tools v2
* @copyright 2019 ProThemes.Biz
*
*/

function alexaRank($site){

    $apiData = simpleCurlGET('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $site);

    if(trim($apiData) === 'Okay')
        $apiData = simpleCurlGET('http://api.prothemes.biz/tools/alexa.php?domain='.$site.'&code=' . $GLOBALS['item_purchase_code']).'&auth='.createLink('',true);

    $xml = simplexml_load_string($apiData);

    $a = $xml->SD[1]->POPULARITY;
    if ($a != null) {
        $alexa_rank = $xml->SD[1]->POPULARITY->attributes()->TEXT;
        $alexa_rank = ($alexa_rank==null ? 'No Global Rank' : $alexa_rank);
    } else {
        $alexa_rank = 'No Global Rank';
    }

    $a1 = $xml->SD[1]->COUNTRY;
    if ($a1 != null) {
        $alexa_pop = $xml->SD[1]->COUNTRY->attributes()->NAME;
        $regional_rank = $xml->SD[1]->COUNTRY->attributes()->RANK;
        $alexa_pop = ($alexa_pop==null ? 'None' : $alexa_pop);
        $regional_rank = ($regional_rank==null ? 'None' : $regional_rank);
    } else {
        $alexa_pop = 'None';
        $regional_rank = 'None';
    }

    $outData = simpleCurlGET("https://www.alexa.com/siteinfo/$site");
    $back = explode('<span class="font-4 box1-r">',$outData);
    $back = explode('</span>',$back[1]);
    $alexa_back = $back[0];

    $alexa_back = ($alexa_back==null ? '0' : $alexa_back);
    return array($alexa_rank,$alexa_pop,$regional_rank,$alexa_back);
}

function cleanText($str){
    $remArr = array("&nbsp;","<br>","<br/>","<br />","\n","\r\n",PHP_EOL);
    $str = str_replace($remArr,"",$str);
    return Trim($str);
}

function getCenterTextC($str1,$str2,$data){
    $data = explode($str1,$data);
    $data = explode($str2,$data[1]);
    return cleanText($data[0]);
}

function alexaExtended($site){
    $outData = simpleCurlGET("https://www.alexa.com/siteinfo/$site");
    $back = explode('<span class="font-4 box1-r">',$outData);
    $back = explode('</span>',$back[1]);
    $alexa_backlinks = $back[0];
    $alexa_backlinks = ($alexa_backlinks==null ? '0' : $alexa_backlinks);
    
    $cloop = 0;
    $top_countryData = array();
    $top_keywordData = array();
    $top_linkDataTemp = array();
    $top_linkData = array();
    $bounce_Data = array();
    $dailyPageviews_Data = array();
        
    $top_countryData_rw = getCenterText('<table cellpadding="0" cellspacing="0" id="demographics_div_country_table" class="table  ">','</table>',$outData);
    $top_countryData_rw = explode("<td class=''><a href='/topsites/countries/",$top_countryData_rw);
    
    $top_keywordData_rw = getCenterText('<table cellpadding="0" cellspacing="0" id="keywords_top_keywords_table" class="table  ">','</table>',$outData);
    $top_keywordData_rw = explode("<td class='topkeywordellipsis'",$top_keywordData_rw);
    
    $top_linkData_rw = getCenterText('<table cellpadding="0" cellspacing="0" id="linksin_table" class="table  table-linksin">','</table>',$outData);
    $top_linkData_rwx = explode("<span class=''><a rel='nofollow' href=\"",$top_linkData_rw);
    $top_linkData_rw = explode("<td class='' ><span class='word-wrap'><a href='/siteinfo/",$top_linkData_rw);
    
    $bounceRateData = explode('<span data-cat="bounce_percent" class="col-pad" href="#">',$outData);
    $bounceRateData = explode('</span>',$bounceRateData[1]);
    
    $bounceRate = getCenterTextC('<strong class="metrics-data align-vmiddle">','</strong>',$bounceRateData[0]);
    $bounceRateArrow = getCenterTextC('<span class="align-vmiddle change-wrapper','change-r"',$bounceRateData[0]);
    $bounceRatePer = getCenterTextC('3 months.">','</span>',$bounceRateData[0]);
    $bounce_Data = array($bounceRate,$bounceRateArrow,$bounceRatePer);
    
    $dailyPageviews = explode('<span data-cat="pageviews_per_visitor" class="col-pad" href="#">',$outData);
    $dailyPageviews = explode('</span>',$dailyPageviews[1]);
    
    $dailyPageviewsRate = getCenterTextC('<strong class="metrics-data align-vmiddle">','</strong>',$dailyPageviews[0]);
    $dailyPageviewsArrow = getCenterTextC('<span class="align-vmiddle change-wrapper','"',$dailyPageviews[0]);
    $dailyPageviewsPer = getCenterTextC('3 months.">','</span>',$dailyPageviews[0]);
    $dailyPageviews_Data = array($dailyPageviewsRate,$dailyPageviewsArrow,$dailyPageviewsPer);
    
    foreach($top_countryData_rw as $top_country){
       if($cloop == 0){
       $cloop++;
       }else{
       $ds = explode('</tr>',$top_country);
       
       $country_code = explode("'>",$ds[0]);
       $country_code = Trim($country_code[0]);
       
       $country_name = explode("Flag'/>",$ds[0]);
       $country_name = explode("</a></td>",$country_name[1]);
       $country_name = cleanText($country_name[0]);
       
       $country_per = explode("<span class=''>",$ds[0]);
       $country_perx = explode("</span></td>",$country_per[1]);
       $country_rank = explode("</span></td>",$country_per[2]);
       $country_per = cleanText($country_perx[0]);
       $country_rank = cleanText($country_rank[0]);
       
       $top_countryData[] = array($country_code,$country_name,$country_per,$country_rank);
       $cloop++;
       }
    }
    return $top_countryData;
}