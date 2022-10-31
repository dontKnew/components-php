<?php

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */

function seoMoz($site,$accessID,$secretKey){

    $expires = time() + 300;
    $SignInStr = $accessID. "\n" .$expires;
    $binarySignature = hash_hmac('sha1', $SignInStr, $secretKey, true);
    $SafeSignature = urlencode(base64_encode($binarySignature));
    $objURL = "http://".$site;
    $cols = "103079231488";
    $flags = "103079215108";
    $reqUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/".urlencode($objURL)."?Cols=".$cols."&AccessID=".$accessID."&Expires=".$expires."&Signature=".$SafeSignature;
    $opts = array(
        CURLOPT_RETURNTRANSFER => true
        );
    $curlhandle = curl_init($reqUrl);
    curl_setopt_array($curlhandle, $opts);
    $content = curl_exec($curlhandle);
    curl_close($curlhandle);
    $resObj = json_decode($content);
    return array (round($resObj->{'umrp'},2),round($resObj->{'upa'},2),round($resObj->{'pda'},2));
}
 
?>