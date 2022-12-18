<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
$data = $info = null;
$data = '5.2.75.91.106.97.104.108.24.70.89.101.93.50.24.57.24.108.103.24.82.24.75.61.71.24.76.103.103.100.107.5.2.57.109.108.96.103.106.50.24.58.89.100.89.98.97.5.2.59.103.104.113.106.97.95.96.108.24.161.24.42.40.41.47.24.72.106.103.76.96.93.101.93.107.38.58.97.114.5.2.106';

$data_count = strlen($data);
$dec = explode(".", $data);

$x = count($dec);
$y = $x-1;

$calc = $dec[$y]-50;
$randkey = chr($calc);
$i = 0;

while ($i < $y) {
    $array[$i] = $dec[$i]+$randkey;
    $info .= chr($array[$i]);
    $i++;
};
echo $info;
?>