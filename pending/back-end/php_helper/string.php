<?php

$address = "House No. 702 Gali No.11, Near Ram Baba Wali Gali, court wali gali, Kapashera, New Delhi-110037";
function linesLimiter($string, $limit) {
  $lines = array();
  $line = "";
  $words = explode(" ", $string);
  foreach($words as $word) {
    if(strlen($line) + strlen($word) <= $limit) {
      $line .= $word . " ";
    }
    else {
      $lines[] = $line;
      $line = $word . " ";
    }
  }
  if(strlen($line) > 0) {
    $lines[] = $line;
  }
  return $lines;
}

print_r(linesLimiter($address,40));


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


function latin_to_english($subject) {
    $char_map = array(
        "??" => "-", "??" => "-", "??" => "-", "??" => "-",
        "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A", "??" => "A",
        "??" => "B", "??" => "B", "??" => "B",
        "??" => "C", "??" => "C", "??" => "C", "??" => "C", "??" => "C", "??" => "C", "??" => "C", "??" => "C", "??" => "C",
        "??" => "D", "??" => "D", "??" => "D", "??" => "D", "??" => "D",
        "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E", "??" => "E",
        "??" => "F", "??" => "F",
        "??" => "G", "??" => "G", "??" => "G", "??" => "G", "??" => "G", "??" => "G", "??" => "G",
        "??" => "H", "??" => "H", "??" => "H", "??" => "H", "??" => "H",
        "I" => "I", "??" => "I", "??" => "I", "??" => "I", "??" => "I", "??" => "I", "??" => "I", "I" => "I", "??" => "I", "??" => "I", "??" => "I", "??" => "I", "??" => "I", "??" => "I", "??" => "I",
        "??" => "J", "??" => "J",
        "??" => "K", "??" => "K", "??" => "K", "??" => "K", "??" => "K",
        "??" => "L", "??" => "L", "??" => "L", "??" => "L", "??" => "L", "??" => "L", "??" => "L",
        "??" => "M", "??" => "M", "??" => "M",
        "??" => "N", "??" => "N", "??" => "N", "??" => "N", "??" => "N", "??" => "N", "??" => "N", "??" => "N", "??" => "N",
        "??" => "O", "??" => "O", "??" => "O", "??" => "O", "??" => "O", "??" => "O", "??" => "O", "??" => "O", "??" => "O", "??" => "O", "??" => "O", "??" => "O",
        "??" => "P", "??" => "P", "??" => "P",
        "??" => "Q",
        "??" => "R", "??" => "R", "??" => "R", "??" => "R", "??" => "R", "??" => "R",
        "??" => "S", "??" => "S", "??" => "S", "??" => "S", "??" => "S", "??" => "S", "??" => "S",
        "??" => "T", "??" => "T", "??" => "T", "??" => "T", "??" => "T", "??" => "T", "??" => "T",
        "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U", "??" => "U",
        "??" => "V", "??" => "V",
        "??" => "Y", "??" => "Y", "??" => "Y", "??" => "Y",
        "??" => "Z", "??" => "Z", "??" => "Z", "??" => "Z", "??" => "Z",
        "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a", "??" => "a",
        "??" => "b", "??" => "b", "??" => "b",
        "??" => "c", "??" => "c", "??" => "c", "??" => "c", "??" => "c", "??" => "c", "??" => "c", "??" => "c", "??" => "c",
        "??" => "ch", "??" => "ch",
        "??" => "d", "??" => "d", "??" => "d", "??" => "d", "??" => "d",
        "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e", "??" => "e",
        "??" => "f", "??" => "f",
        "??" => "g", "??" => "g", "??" => "g", "??" => "g", "??" => "g", "??" => "g", "??" => "g",
        "??" => "h", "??" => "h", "??" => "h", "??" => "h", "??" => "h",
        "i" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i", "??" => "i",
        "??" => "j", "??" => "j", "??" => "j", "??" => "j",
        "??" => "k", "??" => "k", "??" => "k", "??" => "k", "??" => "k",
        "??" => "l", "??" => "l", "??" => "l", "??" => "l", "??" => "l", "??" => "l", "??" => "l",
        "??" => "m", "??" => "m", "??" => "m",
        "??" => "n", "??" => "n", "??" => "n", "??" => "n", "??" => "n", "??" => "n", "??" => "n", "??" => "n", "??" => "n",
        "??" => "o", "??" => "o", "??" => "o", "??" => "o", "??" => "o", "??" => "o", "??" => "o", "??" => "o", "??" => "o", "??" => "o", "??" => "o", "??" => "o",
        "??" => "p", "??" => "p", "??" => "p",
        "??" => "q",
        "??" => "r", "??" => "r", "??" => "r", "??" => "r", "??" => "r", "??" => "r",
        "??" => "s", "??" => "s", "??" => "s", "??" => "s", "??" => "s", "??" => "s", "??" => "s",
        "??" => "t", "??" => "t", "??" => "t", "??" => "t", "??" => "t", "??" => "t", "??" => "t",
        "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u", "??" => "u",
        "??" => "v", "??" => "v",
        "??" => "y", "??" => "y", "??" => "y", "??" => "y",
        "??" => "z", "??" => "z", "??" => "z", "??" => "z", "??" => "z", "??" => "z",
        "???" => "tm",
        "@" => "at",
        "??" => "ae", "??" => "ae", "??" => "ae", "??" => "ae", "??" => "ae",
        "??" => "ij", "??" => "ij",
        "??" => "ja", "??" => "ja",
        "??" => "je", "??" => "je",
        "??" => "jo", "??" => "jo",
        "??" => "ju", "??" => "ju",
        "??" => "oe", "??" => "oe", "??" => "oe", "??" => "oe",
        "??" => "sch", "??" => "sch",
        "??" => "sh", "??" => "sh",
        "??" => "ss",
        "??" => "ue",
        "??" => "zh", "??" => "zh",
    );
    return strtr($subject, $char_map);
}
echo replace_spec_char("????????");
/*<script>function Convert(string){ return string.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); } console.log(Convert("?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ")
const str = "Cr??me Brul str.normalize('NFD').replace(/[\u0300-\u036f]/g, "") > 'Creme Brulee'</script>*/

function latin_to_normal($string){
//	$latin_string = '??bc??fgh??jklmn??pqrs??vwxyz';
	$latin_string = $string;
	$normal_string = preg_replace('/[^\x00-\x7F]/', '', Normalizer::normalize($latin_string, Normalizer::FORM_D));
	return $normal_string;    // output: AbcEfghijklmnOpqrsUvwxyz
}

function range_increment($start, $end):array(){
	$range = [];
	for ($i = $start; $i <= $end; $i++) {
	    array_push($range, $i);
	}
	return $range;
}
?>

