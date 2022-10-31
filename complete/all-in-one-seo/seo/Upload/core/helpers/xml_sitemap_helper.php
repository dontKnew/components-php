<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
function genSiteLinks($my_url){
require_once(LIB_DIR.'simple_html_dom.php');
$ex_data_arr = $int_data = array();
$data = file_get_html($my_url);

if($data == '')
   return false;

//Parse Host
$my_url_parse = parse_url($my_url);
$inputHost = $my_url_parse['scheme'] . "://" . $my_url_parse['host'];
$my_url_host = str_replace("www.","",$my_url_parse['host']);
$my_url_path = $my_url_parse['path'];
$my_url_query = $my_url_parse['query'];
$find_out = $data->find("a");
    
	foreach($find_out as $href) {
		if(!in_array($href->href, $ex_data_arr)) {
			if(substr($href->href, 0, 1) != "" && $href->href != "#") {
				$ex_data_arr[] = $href->href;
				$ex_data[] = array(
					'href' => $href->href,
					'rel' => $href->rel
				);
			}
		}
	}

	foreach($ex_data as $count=>$link) {
		$parse_urls = parse_url($link['href']);
  
		if($parse_urls['host'] == $my_url_host  || $parse_urls['host'] == "www.".$my_url_host ) {
            if(substr($link['href'], 0, 7) == "http://") { 
			 //Link Okay
            }
 			elseif(substr($link['href'], 0, 8) == "https://") { 
			 //Link Okay
            }
		    elseif(substr($link['href'], 0, 2) == "//") {
				$link['href'] = "http:" . $link['href'];
            }
		    elseif(substr($link['href'], 0, 1) == "/") {
				$link['href'] = $inputHost . $link['href'];
		    }
            else{
                $link['href'] = $inputHost .'/'. $link['href'];
            }
         
            if(!in_array($link['href'], $int_data)) {
                if(!in_array($link['href'].'/', $int_data)) {
                    if($link['href'] != '')
                        $int_data[] = $link['href'];
                }
            }
		}
		elseif((substr($link['href'], 0, 2) != "//") && (substr($link['href'], 0, 1) == "/")) {
		   
            if(substr($link['href'], 0, 7) == "http://") { 
			 //Link Okay
            }
 			elseif(substr($link['href'], 0, 8) == "https://") { 
			 //Link Okay
            }
		    elseif(substr($link['href'], 0, 2) == "//") {
				$link['href'] = "http:" . $link['href'];
            }
		    elseif(substr($link['href'], 0, 1) == "/") {
				$link['href'] = $inputHost . $link['href'];
		    }
            else{
                $link['href'] = $inputHost .'/'. $link['href'];
            }
              
            if(!in_array($link['href'], $int_data)) {
                if(!in_array($link['href'].'/', $int_data)) {
                    if($link['href'] != '')
                        $int_data[] = $link['href'];
                }
            }
		}else{
            if(substr($link['href'], 0, 7) != "http://" && substr($link['href'], 0, 8) != "https://" &&
            substr($link['href'], 0, 2) != "//" && substr($link['href'], 0, 1) != "/" && substr($link['href'], 0, 1) != "#"
            && substr($link['href'], 0, 2) != "//" && substr($link['href'], 0, 4) != "tel:" && substr($link['href'], 0, 6) != "mailto" && substr($link['href'], 0, 10) != "javascript") {
			 //Link Okay
             $link['href'] = $inputHost .'/'. $link['href'];
             
             if(!in_array($link['href'], $int_data)) {
                if(!in_array($link['href'].'/', $int_data)) {
                    if($link['href'] != '')
        	            $int_data[] = $link['href'];
                }
             }
            
            }
		}
  
	}

    return $int_data;
}