<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */

function getMyMeta($url, $noTitle='No Title', $noDes='No Description', $noKey='No Keywords'){
    
    $title = $description = $keywords = $html = $author = $siteName = '';
    $viewport = '-';
    $lenTitle = $lenDes = 0;
    $openG = false;
    
    //Get Data of the URL
    $html = curlGET($url);
    
    if($html == '')
        return false;
    
    //Fix Meta Uppercase Problem
    $html = str_ireplace(array("Title","TITLE"),"title",$html);
    $html = str_ireplace(array("Description","DESCRIPTION"),"description",$html);
    $html = str_ireplace(array("Keywords","KEYWORDS"),"keywords",$html);
    $html = str_ireplace(array("Content","CONTENT"),"content",$html);  
    $html = str_ireplace(array("Meta","META"),"meta",$html);  
    $html = str_ireplace(array("Name","NAME"),"name",$html);      
    
    //Load the document and parse the meta     
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $nodes = $doc->getElementsByTagName('title');
    $title = $nodes->item(0)->nodeValue;
    $metas = $doc->getElementsByTagName('meta');

    for ($i = 0; $i < $metas->length; $i++){
        $meta = $metas->item($i);
        if($meta->getAttribute('name') == 'description')
           $description = $meta->getAttribute('content');
        if($meta->getAttribute('name') == 'keywords')
            $keywords = $meta->getAttribute('content');
        if($meta->getAttribute('name') == 'viewport')
            $viewport = $meta->getAttribute('content');
        if($meta->getAttribute('name') == 'author')
            $author = $meta->getAttribute('content');   
        if($meta->getAttribute('property') == 'site_name')
            $siteName = $meta->getAttribute('content');   
        if($meta->getAttribute('property') == 'og:title')
            $openG = true;
    }
    
    $lenTitle = mb_strlen($title);
    $lenDes = strlen($description);
    
    //Check Empty Data
    $title = ($title == '' ? $noTitle : $title);
    $description = ($description == '' ? $noDes : $description);
    $keywords = ($keywords == '' ? $noKey : $keywords);
    
    //Return as Array
    return array($title,$description,$keywords, $openG, $lenTitle , $lenDes, $viewport, $author, $siteName);
}

?>