<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright 2020 ProThemes.Biz
 *
 */

function itIsOnline($site){
    $curlInit = curl_init($site);
    curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($curlInit, CURLOPT_TIMEOUT, 20);
    curl_setopt($curlInit, CURLOPT_HEADER, true);
    curl_setopt($curlInit, CURLOPT_NOBODY, true);
    curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlInit, CURLOPT_FOLLOWLOCATION, true);

    $response = curl_exec($curlInit);
    $info = curl_getinfo($curlInit);
    $response_time = substr($info['total_time'], 0, 4);
    $http_code = $info['http_code'];
    curl_close($curlInit);
    if ($response)
        return array(true,$response_time,$http_code);
    return array(false,"No Response","unknown");
}
