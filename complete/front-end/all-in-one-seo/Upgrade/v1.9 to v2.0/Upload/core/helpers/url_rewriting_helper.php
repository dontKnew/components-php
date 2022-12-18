<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */

function split_up_me($url)
{
    $url = htmlspecialchars_decode($url);
    $arr = parse_url($url);
    $arg_arr = explode("&", $arr['query']);
    $file_arr = explode("/", $arr['path']);

    foreach ($file_arr as $val)
    {
        $filename = $val;
    }

    $file_without = explode(".", $filename);
    $file_without = $file_without[0];

    foreach ($arg_arr as $val)
    {
        $arg[] = explode("=", $val);
    }
    return array(
        $filename,
        $file_without,
        $arg);
}

function checkDyn($url)
{
    $url = htmlspecialchars_decode($url);
    $arr = parse_url($url);
    if ($arr['query'] == '')
    {
        return '0';
    } else
    {

        return '1';
    }
}

?>