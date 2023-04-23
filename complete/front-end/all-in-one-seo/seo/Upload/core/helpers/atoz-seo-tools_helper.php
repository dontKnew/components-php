<?php
/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright 2019 ProThemes.Biz
 *
 */
 
function regRecentHistory($con,$ip,$toolname,$user,$date,$intDate){
    mysqli_query($con,"INSERT INTO recent_history (visitor_ip,tool_name,user,date,intDate) VALUES ('$ip','$toolname','$user','$date','$intDate')");
    return true;
}

function regUserInputHistory($con,$ip,$toolname,$user,$date,$regUserInput){
    $regUserInput = escapeTrim($con,$regUserInput);
    mysqli_query($con,"INSERT INTO user_input_history (visitor_ip,tool_name,user,date,user_input) VALUES ('$ip','$toolname','$user','$date','$regUserInput')");
    return true;
}

function getGuestUserCount($con,$ip){
    $result = mysqli_query($con,"SELECT visitor_ip,intDate FROM recent_history WHERE visitor_ip='$ip' AND intDate='".date('m/d/Y')."' AND user='Guest'");
    return $result->num_rows; 
}

function cleanWWW($string) {
    return str_replace('www.','',strtolower($string));
}

function curlGET_Text($url){
    $cookie = TMP_DIR.unqFile(TMP_DIR, randomPassword().'_curl.tdata');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);  
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
	curl_setopt($ch, CURLOPT_HEADER,0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_AUTOREFERER,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0');
	curl_setopt($ch, CURLOPT_HTTPHEADER,array ("Accept: text/plain"));
	$html=curl_exec($ch);
    curl_close($ch);
    return $html;
}

function getSuggestQueries($userInput,$err_str="Something Went Wrong") {
    
    $googleUrl = 'http://suggestqueries.google.com/complete/search';
    $keywords = array();
    $json = simpleCurlGET($googleUrl.'?output=firefox&client=firefox&hl=en-US&q='.urlencode($userInput));
    
    if($json == '') die($err_str);
    
    $json = json_decode($json, true);
    $keywords = $json[1];
    return $keywords;
}

function checkRedirect($my_url,$goodStr="Good",$badStr="Bad - Not Redirecting!") {    
    $my_url = clean_url($my_url); 
    $re301 = false;
    $url_with_www = "http://www.$my_url";
    $url_no_www = "http://$my_url";
    
    $data1 = getHttpCode($url_with_www,false);
    $data2 = getHttpCode($url_no_www,false);
    
    if($data1 == '301')
        $re301 = true;
    if($data2 == '301')
        $re301 = true;
    
    $str = ($re301 == true ? $goodStr : $badStr); 
    return $str;
}

function getPageData($myUrl,$error) {
    $timeStart = microtime(true);
    $data = file_get_html($myUrl);
    if(empty($data)) {
        echo $error;
        die();
    }
    $timeEnd = microtime(true);
    $timeTaken = $timeEnd - $timeStart;
    return array($data, $timeTaken);
}

function capPages(){
    
    $arr = array(
        'register_page' => 'Registration Page', 
        'login_page' => 'Login Page', 
        'contact_page' => 'Contact Us Page', 
        'allseo_page' => 'All SEO Tool Pages', 
        'reset_pass_page' => 'Forgot Password Page', 
        'resend_act_page' => 'Resend Activation Mail Page',
        'admin_login_page' => 'Administrator Login Page'
    );
    return $arr;
}

function getSEOToolsName($con){
    $tools = array();
    
    $result = mysqli_query($con, 'SELECT * FROM seo_tools ORDER BY CAST(tool_no AS UNSIGNED) ASC');
    while ($row = mysqli_fetch_array($result)){
        if(isSelected($row['tool_show']))
            $tools[shortCodeFilter($row['tool_name'])] = $row['uid'];
    }
    return $tools;
}

function getTopSEOTools($con, $arr){
    $result = mysqli_query($con, 'SELECT * FROM seo_tools ORDER BY CAST(tool_no AS UNSIGNED) ASC');
    while ($row = mysqli_fetch_array($result)){
        if(isSelected($row['tool_show'])){
            if(in_array($row['uid'],$arr))
                echo '<li><a href="'.createLink($row['tool_url'],true).'">'.shortCodeFilter($row['tool_name']).' </a></li>';
        }
    }
}

function ordinal($num) {
    $num = (int)$num;
    if ( ($num / 10) % 10 != 1 ){
        switch( $num % 10 )
        {
            case 1: return $num . 'st';
            case 2: return $num . 'nd';
            case 3: return $num . 'rd'; 
        }
    }
    return $num . 'th';
}