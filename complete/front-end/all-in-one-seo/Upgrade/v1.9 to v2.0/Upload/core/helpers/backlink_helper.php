<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
function googleBack($site)
{
    $url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=link:" . $site .
        "&filter=0";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $json = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($json, true);
    $check = $data['responseDetails'];
    if (str_contains($check, "Suspected"))
    {
        $ip = explode(".", $_SERVER['SERVER_ADDR']);
        $ip = $ip[0] . "." . $ip[1] . "." . rand(0, 255) . "." . rand(0, 255);
        $url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=link:" . $site .
            "&filter=0&userip=" . $ip;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $json = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($json, true);
    }
    if ($data['responseStatus'] == 200)
    {
        $data = $data['responseData']['cursor']['resultCount'];
        if ($data == '')
            $data = 0;
        return $data;
    } else
        return "0";
}

function bingBack($link) {
    $link = "http://www.bing.com/search?q=link%3A" . trim($link) .
        "&go=&qs=n&sk=&sc=8-5&form=QBLH";
    $source = getMyData($link);
    $s = explode('<span class="sb_count">', $source);
    $s = explode('</span>', $s[1]);
    $s = explode('results', $s[0]);
    $s = Trim($s[0]);
    $s = Trim(str_replace("Resultaten","",$s));
    if ($s == '')
    {
        $s = 0;
    }
    return $s;
}
?>