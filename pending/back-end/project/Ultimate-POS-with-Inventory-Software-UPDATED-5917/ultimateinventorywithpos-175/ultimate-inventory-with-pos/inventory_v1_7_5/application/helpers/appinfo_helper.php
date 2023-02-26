<?php
function appinfo($salt = "") {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $temp = sys_get_temp_dir().DIRECTORY_SEPARATOR;
        if(!file_exists($temp) && !is_file($temp)) file_put_contents($temp, "select disk 0\ndetail disk");
        $output = (isEnabled('shell_exec')) ? shell_exec("diskpart /s ".$temp) : '';
        $lines = explode("\n",$output);
        $result = array_filter($lines,function($line) {
            return stripos($line,"ID:")!==false;
        });
        if(count($result)>0) {

            $result = array_shift($result);
            $result = explode(":",$result);
            $result = trim(end($result));       
        } else $result = $output;       
    } else {
        $result = (isEnabled('shell_exec')) ? shell_exec("blkid -o value -s UUID") : '';  
        if(stripos($result,"blkid")!==false) {
            $result = $_SERVER['HTTP_HOST'];
        }
    }   
    return md5($salt.md5($result));
}
function appinfo_mid_msg(){
    $msg = "/I/n/v/a/l/i/d /L/i/c/e/n/s/e/! /P/l/e/a/s/e /P/u/r/c/h/a/s/e/ /n/e/w /L/i/c/e/n/s/e/. /M/I/D";
    return str_replace("/", "", $msg);
}
function appinfo_domain_msg(){
    $msg = "/I/n/v/a/l/i/d /L/i/c/e/n/s/e/! /P/l/e/a/s/e /P/u/r/c/h/a/s/e/ /n/e/w /L/i/c/e/n/s/e/. /D/O/M";
    return str_replace("/", "", $msg);
}
function get_dbmid(){
    $CI =& get_instance();
    return $CI->db->select("machine_id")->where("id",1)->get("db_sitesettings")->row()->machine_id;
}
function get_domain(){
    return $_SERVER['SERVER_NAME'];
}
function get_dbdomain(){
    $CI =& get_instance();
    return $CI->db->select("domain")->where("id",1)->get("db_sitesettings")->row()->domain;
}
function isEnabled($func) {
    return is_callable($func) && false === stripos(ini_get('disable_functions'), $func);
}
