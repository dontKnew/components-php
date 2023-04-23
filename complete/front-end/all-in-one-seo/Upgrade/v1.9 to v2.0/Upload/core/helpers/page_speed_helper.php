<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
function checkPageSpeed($url,$error="Something Went Wrong")
{
    //Error Message
    define('ERR_MSG',$error);
    
    //Set Execution Time
    ini_set('max_execution_time', 20*60);
        
    //Library
    require_once(LIB_DIR."simple_html_dom.php");
	
    //Parse Host
    $inputUrl = parse_url($url);
	$inputHost = $inputUrl['scheme'] . "://" . $inputUrl['host'];
	
    //Define Links Array
    $linkData = array();
    $cssData = array();
    $scriptData = array();
    $imgData = array();
    $otherData = array();
	$downloadedData = array();
    
    //Main URL Time Taken
	$myPageData = getPageData($url,$error);
	$time = $myPageData[1];
	$outData = $myPageData[0];
    
    //Link Tag
	foreach($outData->find('link') as $myLink) {
		$href = $myLink->href;

		if(!empty($href)) {
			if(substr($href, 0, 7) == "http://") { 
			 //Link Okay
            }
 			elseif(substr($href, 0, 8) == "https://") { 
			 //Link Okay
            }
		    elseif(substr($href, 0, 2) == "//") {
				$href = "http:" . $href;
            }
		    elseif(substr($href, 0, 1) == "/") {
				$href = $inputHost . $href;
		    }
            else{
                $href = $inputHost .'/'. $href;
            }

				if(!in_array($href, $downloadedData)) {
					$timeTaken = calPageSpeed($href,$url);
					$time = $time + $timeTaken;
                    
                    if(str_contains($href,'.css')) {
                    $arrData =   array('CSS', $href, round($timeTaken, 2));
 				    $linkData[] = $arrData;
                    $cssData[] = $arrData;
                    }else{
                    $arrData =  array('Resources', $href, round($timeTaken, 2));
 				    $linkData[] = $arrData;
                    $otherData[] = $arrData;
                    }
                    
                    //Add to Downloaded Links
					$downloadedData[] = $href;
				}
		}
	}
    
    //Image Tag
   	foreach($outData->find('img') as $myLink) {
		$href = $myLink->src;

		if(!empty($href)) {
		  
			if(substr($href, 0, 7) == "http://") { 
			 //Link Okay
            }
 			elseif(substr($href, 0, 8) == "https://") { 
			 //Link Okay
            }
		    elseif(substr($href, 0, 2) == "//") {
				$href = "http:" . $href;
            }
		    elseif(substr($href, 0, 1) == "/") {
				$href = $inputHost . $href;
		    }
            else{
                $href = $inputHost .'/'. $href;
            }


				if(!in_array($href, $downloadedData)) {
					$timeTaken = calPageSpeed($href,$url);
					$time = $time + $timeTaken;
                    $arrData = array('Image', $href, round($timeTaken, 2)); 
                    $linkData[] = $arrData;
                    $imgData[] =  $arrData;
    
                    //Add to Downloaded Links
					$downloadedData[] = $href;
				}

		}
	}
    
    //Script Tag
	foreach($outData->find('script') as $myLink) {
		$href = $myLink->src;

		  if(!empty($href)) {
		      
			if(substr($href, 0, 7) == "http://") { 
			 //Link Okay
            }
 			elseif(substr($href, 0, 8) == "https://") { 
			 //Link Okay
            }
		    elseif(substr($href, 0, 2) == "//") {
				$href = "http:" . $href;
            }
		    elseif(substr($href, 0, 1) == "/") {
				$href = $inputHost . $href;
		    }
            else{
                $href = $inputHost .'/'. $href;
            }


				if(!in_array($href, $downloadedData)) {
					$timeTaken = calPageSpeed($href,$url);
					$time = $time + $timeTaken;
                    $arrData = array('Script', $href, round($timeTaken, 2)); 
                    $linkData[] = $arrData; 
                    $scriptData[] = $arrData;
                    
                    //Add to Downloaded Links
					$downloadedData[] = $href;
				}

		}
	}

  //Average time taken
  $avgTimeTaken = round($time, 2); 
     
 return array($avgTimeTaken,$linkData,$cssData,$imgData,$scriptData,$otherData);
 
}
 ?>