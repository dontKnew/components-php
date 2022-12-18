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

/*number to currenct() see codeigniter */

/* get main domain from subdomain */
function get_domain("sajid.sajid.lenskartbusiness.com){
    $myhost = strtolower(trim($host));
    $count = substr_count($myhost, '.');
    if($count === 2){
        if(strlen(explode('.', $myhost)[1]) > 3) $myhost = explode('.', $myhost, 2)[1];
    } else if($count > 2){
        $myhost = get_domain(explode('.', $myhost, 2)[1]);
    }
    return $myhost;
}