<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */

$tools = array();

$result = mysqli_query($con, 'SELECT * FROM seo_tools ORDER BY CAST(tool_no AS UNSIGNED) ASC');

while ($row = mysqli_fetch_array($result)){

    if(isSelected($row['tool_show'])) 
        $tools[] = array(shortCodeFilter($row['tool_name']),createLink($row['tool_url'],true),$row['icon_name'],$row['tool_show'],$row['tool_no']);
}

?>