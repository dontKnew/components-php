<?php
function first_line_limiter($string_to_split,  int $limit_word) : array{
    $first_limited_line = '';
    $last_string = '';
    
    $string_five=explode(" ",trim($string_to_split));
    
    for ($x=0;$x<=count($string_five);$x++){
    	if($x < $limit_word){
            $first_limited_line .= $string_five[$x]. " ";
        }else {
        	$last_string .= $string_five[$x]. " ";
        }
   }
   return array($first_limited_line, $last_string);
}

$mystr = "Rapidex Worldwide Express believes reliability is the key to satisfied customer. Rapidex Worldwide";
//print_r(first_line_limiter($mystr, 5));

function word_limit(string $str, int $limit = 100, string $endChar = '&#8230;'): string{
    if (trim($str) === '') {return $str;}
    preg_match('/^\s*+(?:\S++\s*+){1,' . $limit . '}/', $str, $matches);
    if (strlen($str) === strlen($matches[0])) {
        $endChar = '';
    }
    return rtrim($matches[0]) . $endChar;
}

function letters_limit_word(string $str, int $n = 500, string $endChar = '&#8230;'): string{
    if (mb_strlen($str) < $n) {
        return $str;
    }
    // a bit complicated, but faster than preg_replace with \s+
    $str = preg_replace('/ {2,}/', ' ', str_replace(["\r", "\n", "\t", "\x0B", "\x0C"], ' ', $str));
    if (mb_strlen($str) <= $n) {
        return $str;
    }
    $out = '';
    foreach (explode(' ', trim($str)) as $val) {
        $out .= $val . ' ';
        if (mb_strlen($out) >= $n) {
            $out = trim($out);
            break;
        }
    }
    return (mb_strlen($out) === mb_strlen($str)) ? $out : $out . $endChar;
}

function letter_limit(string $str, int $n = 500, string $endChar = '&#8230;'): string{
    if (mb_strlen($str) < $n) {
        return $str;
    }
    // a bit complicated, but faster than preg_replace with \s+
    $str = preg_replace('/ {2,}/', ' ', str_replace(["\r", "\n", "\t", "\x0B", "\x0C"], ' ', $str));
    if (mb_strlen($str) <= $n) {
        return $str;
    }
    $out = '';
    foreach (explode(' ', trim($str)) as $val) {
        $out .= $val . ' ';
        if (mb_strlen($out) >= $n) {
            $out = trim($out);
            break;
        }
    }
    return (mb_strlen($out) === mb_strlen($str)) ? $out : $out . $endChar;
}
//echo letters_limit("this is nice boy", 9);


/* @param string $type Type of random string.  basic, alpha, alnum, numeric, nozero, md5, sha1, and crypto
 * @param int $len Number of characters
 */
function random_string(string $type = 'alnum', int $len = 8): string
{
    switch ($type) {
        case 'alnum':
        case 'numeric':
        case 'nozero':
        case 'alpha':
            switch ($type) {
                case 'alpha':
                    $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    break;

                case 'alnum':
                    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    break;

                case 'numeric':
                    $pool = '0123456789';
                    break;

                case 'nozero':
                    $pool = '123456789';
                    break;
            }

            return substr(str_shuffle(str_repeat($pool, (int) ceil($len / strlen($pool)))), 0, $len);

        case 'md5':
            return md5(uniqid((string) mt_rand(), true));

        case 'sha1':
            return sha1(uniqid((string) mt_rand(), true));

        case 'crypto':
            if ($len % 2 !== 0) {
                throw new InvalidArgumentException(
                    'You must set an even number to the second parameter when you use `crypto`.'
                );
            }

            return bin2hex(random_bytes($len / 2));
    }
    // 'basic' type treated as default
    return (string) mt_rand();
}

?>