<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */

function spiderView($url,$err_str="Input Site is not valid!") {

    //Get Data of the URL
    $html = getMydata($url);
    
    if($html == ""){
    die($err_str);   
    }
    
    //Source Data
    $sourceData = $html;
    
    //Only Text Content
    $textData = preg_replace('/(<script.*?>.*?<\/script>|<style.*?>.*?<\/style>|<.*?>|\r|\n|\t)/ms', '', $html);  
    $textData = preg_replace('/ +/ms', ' ', $textData);  
    
    //Fix Meta Uppercase Problem
    $html = str_ireplace(array("Title","TITLE"),"title",$html);
    $html = str_ireplace(array("Description","DESCRIPTION"),"description",$html);
    $html = str_ireplace(array("Keywords","KEYWORDS"),"keywords",$html);
    $html = str_ireplace(array("Content","CONTENT"),"content",$html);  
    $html = str_ireplace(array("Meta","META"),"meta",$html);  
    $html = str_ireplace(array("Name","NAME"),"name",$html);  
    
    $doc = new DOMDocument();
    $doc->loadHTML($html);
    
    $nodes = $doc->getElementsByTagName('title');
    $title = $nodes->item(0)->nodeValue;
    $metas = $doc->getElementsByTagName('meta');
    
    for ($i = 0; $i < $metas->length; $i++)
    {
    $meta = $metas->item($i);
    if($meta->getAttribute('name') == 'description')
       $description = $meta->getAttribute('content');
    if($meta->getAttribute('name') == 'keywords')
        $keywords = $meta->getAttribute('content');
    }
    
    //Check Empty Data
    $site_title = ($title == '' ? "No Title" : $title);
    $site_description = ($description == '' ? "No Description" : $description);
    $site_keywords = ($keywords == '' ? "No Keywords" : $keywords);
    
    $tags = array ('h1', 'h2', 'h3', 'h4');
    $texts = array ();
    foreach($tags as $tag)
    {
      $elementList = $doc->getElementsByTagName($tag);
      foreach($elementList as $element)
      {
         $texts[$element->tagName][] = $element->textContent;
      }
    }

    $arr_meta = array($sourceData,$site_title,$site_description,$site_keywords,$textData,$texts);
    return $arr_meta;
}
?>