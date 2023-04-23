<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
function genMeta($metaTitle,$metaDescription,$metaKeywords,$robotsIndex,$robotsLinks,$contentType,$lang,$revisitdays,$authorname,$checkRevisit,$checkAuthor){  	
	
    $metaTitle = ucfirst($metaTitle);
    
   	$metaKeywords = str_replace(array("\r\n", "\r", "\n", '"'),"", $metaKeywords);
   	
    $metaDescription = str_replace(array("\r\n", "\r", "\n", '"'),"", $metaDescription);
		
    $data .= '<meta name="title" content="' . $metaTitle . '">' . PHP_EOL;
	$data .= '<meta name="description" content="' . $metaDescription . '">' . PHP_EOL;
	$data .= '<meta name="keywords" content="' . $metaKeywords . '">' . PHP_EOL;
	$data .= '<meta name="robots" content="' . $robotsIndex . ', ' . $robotsLinks . '">' . PHP_EOL;
	$data .= '<meta http-equiv="Content-Type" content="' . $contentType . '">' . PHP_EOL;
	
    if($lang != "N/A"){
        $data .= '<meta name="language" content="' . $lang . '">' . PHP_EOL;
	}
    
    if($checkRevisit){
        $data .= '<meta name="revisit-after" content="' . $revisitdays . ' days">' . PHP_EOL;
    }
    if($checkAuthor){
        $data .= '<meta name="author" content="' . $authorname . '">' . PHP_EOL;
    }

    return htmlspecialchars($data);
}

?>