<?php
/*separator can be prefer : -, _*/
function url_title(string $str, string $separator = '-', bool $lowercase = false): string
{
    $qSeparator = preg_quote($separator, '#');

    $trans = [
        '&.+?;'                  => '',
        '[^\w\d\pL\pM _-]'       => '',
        '\s+'                    => $separator,
        '(' . $qSeparator . ')+' => $separator,
    ];

    $str = strip_tags($str);

    foreach ($trans as $key => $val) {
        $str = preg_replace('#' . $key . '#iu', $val, $str);
    }

    if ($lowercase === true) {
        $str = mb_strtolower($str);
    }
    return trim(trim($str, $separator));
}
echo url_title("This Is my work bro ?", "_");


/* get main domain from subdomain */
function domain_from_subdomain("sajid.sajid.lenskartbusiness.com"){
    $myhost = strtolower(trim($host));
    $count = substr_count($myhost, '.');
    if($count === 2){
        if(strlen(explode('.', $myhost)[1]) > 3) $myhost = explode('.', $myhost, 2)[1];
    } else if($count > 2){
        $myhost = get_domain(explode('.', $myhost, 2)[1]);
    }
    return $myhost;
}

function rootPath(){
    return trim($_SERVER["DOCUMENT_ROOT"]);
}

function rootUrl(string $basePath){
    if(!empty($basePath)){
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'.$basePath;
    }else {
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    }
    return $url;
}

function dump($data='', $var_dump=true, $print_r=false, $var_export=false, $pretty=true){
    if($pretty){
        if($var_dump){
            echo "<pre>";
            var_dump($data);
            echo "</pre>";
        }else if($print_r){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }else if($var_export){
            echo "<pre>";
            var_export($data);
            echo "</pre>";
        }else {
            return "Please choose printing Method";
        }
    }else {
        if($var_dump){
            var_dump($data);
        }else if($print_r){
            print_r($data);
        }else if($var_export){
            var_export($data);
        }else {
            return "Please choose printing Method";
        }
    }
}
