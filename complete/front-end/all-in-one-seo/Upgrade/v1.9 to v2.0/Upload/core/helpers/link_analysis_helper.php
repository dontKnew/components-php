<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */

function doLinkAnalysis($my_url){
        
    //Set Execution Time
    ini_set('max_execution_time', 20*60);
    
    //Library
    require_once (LIB_DIR . "simple_html_dom.php");
    
    //Define Variables
    $ex_data_arr = array();
    $t_count = 0;
    $i_links = 0;
    $e_links = 0;
    $i_nofollow = 0;
    $e_nofollow = 0;
    
    //Get Data
    $data = file_get_html($my_url);
    
    if($data == '')
        return false;
    
    //Parse the main URL - Host / Path / Query 
    $my_url_parse = parse_url($my_url);
    $my_url_host = str_replace("www.", "", $my_url_parse['host']);
    $my_url_path = $my_url_parse['path'];
    $my_url_query = $my_url_parse['query'];
    $find_out = $data->find("a");
    
    //Extract Links
    foreach ($find_out as $href)
    {
        if (!in_array($href->href, $ex_data_arr))
        {
            if (substr($href->href, 0, 1) != "" && $href->href != "#")
            {
                $ex_data_arr[] = $href->href;
                $ex_data[] = array('href' => $href->href, 'rel' => $href->rel);
            }
        }
    }

    //Internal Links
    foreach ($ex_data as $count => $link)
    {
        $t_count++;
        $parse_urls = parse_url($link['href']);
        $type = strtolower($link['rel']);

        if ($parse_urls['host'] == $my_url_host || $parse_urls['host'] == "www." . $my_url_host)
        {
            $i_links++;
            $int_data[$i_links]['inorout'] = "internal";
            $int_data[$i_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow'))
            {
                $int_data[$i_links]['follow_type'] = "dofollow";
            }
            if ($type == 'nofollow')
            {
                $i_nofollow++;
                $int_data[$i_links]['follow_type'] = "nofollow";
            }
        } elseif ((substr($link['href'], 0, 2) != "//") && (substr($link['href'], 0, 1) ==
        "/"))
        {
            $i_links++;
            $int_data[$i_links]['inorout'] = "internal";
            $int_data[$i_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow'))
            {
                $int_data[$i_links]['follow_type'] = "dofollow";
            }
            if ($type == 'nofollow')
            {
                $i_nofollow++;
                $int_data[$i_links]['follow_type'] = "nofollow";
            }
        }

    }

    //External Links
    foreach ($ex_data as $count => $link)
    {
        $parse_urls = parse_url($link['href']);
        $type = strtolower($link['rel']);

        if ($parse_urls !== false && isset($parse_urls['host']) && $parse_urls['host'] !=
            $my_url_host && $parse_urls['host'] != "www." . $my_url_host)
        {
            $e_links++;
            $ext_data[$e_links]['inorout'] = "external";
            $ext_data[$e_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow'))
            {
                $ext_data[$e_links]['follow_type'] = "dofollow";
            }
            if ($type == 'nofollow')
            {
                $e_nofollow++;
                $ext_data[$e_links]['follow_type'] = "nofollow";
            }
        } elseif ((substr($link['href'], 0, 2) == "//") && (substr($link['href'], 0, 1) !=
        "/"))
        {
            $e_links++;
            $ext_data[$e_links]['inorout'] = "external";
            $ext_data[$e_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow'))
            {
                $ext_data[$e_links]['follow_type'] = "dofollow";
            }
            if ($type == 'nofollow')
            {
                $e_nofollow++;
                $ext_data[$e_links]['follow_type'] = "nofollow";
            }
        }
    }
    
    //Return the data as Array
    return array(
        $int_data,
        $i_links,
        $i_nofollow,
        $ext_data,
        $e_links,
        $e_nofollow,
        $t_count);
}

?>