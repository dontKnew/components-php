<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
if(defined('CUSTOM_ROUTE')){
    if(!CUSTOM_ROUTE){
        stop("No Custom Router Enabled");
    }
}

//$custom_route['Route Path Name'] = "Controller Name";

//Basic Controller Routing
//$custom_route['contact'] = "contactus";

//Specific PointOut into Controller Routing
//$custom_route['product/update'] = "update";

//Specific Route Path into Specific PointOut Routing
//$custom_route['product'] = "product/sub";

//Dynamic PointOut Routing
//$custom_route['blog/[:any]'] = "product";

//Hide Real Controller Routing
//$custom_route['product'] = "error";

$custom_route['lang/set'] = "ajax/lang";
$custom_route['theme/set'] = "ajax/theme";
$custom_route['templates/preview'] = "ajax/templates";
$custom_route['theme/unset'] = "ajax/theme/unset";
$custom_route['rainbow/track'] = "track";
$custom_route['rainbow/master-js'] = "ajax/master-js";
$custom_route['phpcap/reload'] = "ajax/phpcap/reload";
$custom_route['phpcap/image'] = "ajax/phpcap/image";
$custom_route['verify'] = "ajax/account-verify";

$query = mysqli_query($con, "SELECT * FROM seo_tools WHERE tool_url='$controller'");
if (mysqli_num_rows($query) > 0){
    $data = mysqli_fetch_array($query);
    $tool_show = filter_var($data['tool_show'], FILTER_VALIDATE_BOOLEAN);
    if($tool_show) {
    $controller = 'seotools';
    $toolUid = $data['uid'];
    $tool_login = filter_var($data['tool_login'], FILTER_VALIDATE_BOOLEAN);
    permit($con);
    $data['tool_name'] = shortCodeFilter($data['tool_name']);
    $data['meta_title'] = shortCodeFilter($data['meta_title']);
    $data['meta_des'] = shortCodeFilter($data['meta_des']);  
    $data['meta_tags'] = shortCodeFilter($data['meta_tags']);
    $data['about_tool'] = shortCodeFilter($data['about_tool']);
    
        //Visitors Limit - START
        if($enable_reg){
            if(!isset($_SESSION[N_APP.'UserToken'])){
                if($visitors_limit != '0'){
                    $user_count = getGuestUserCount($con,$ip);
                    if($visitors_limit<$user_count){
                     $visitWarn = true;   
                     redirectTo(createLink('account/login',true));
                     die();
                    }
                }
                if($tool_login){
                    $loginWarn = true;   
                    redirectTo(createLink('account/login',true));
                    die();
                }
            }
        }
        //Visitors Limit - END
    }
}