<?php
function getGoogleMap($iframe_tag){
	$dom = new DOMDocument();
	$dom->loadHTML($iframe_tag);
	$iframe = $dom->getElementsByTagName('iframe')->item(0);
	$src = $iframe->getAttribute('src');
	$queryString = parse_url($src, PHP_URL_QUERY);
	parse_str($queryString, $params);
	$data['google_map'] = $params['pb'] ?? null;
	return $data['google_map'];
}


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
        "ъ" => "-", "ь" => "-", "Ъ" => "-", "Ь" => "-",
        "А" => "A", "Ă" => "A", "Ǎ" => "A", "Ą" => "A", "À" => "A", "Ã" => "A", "Á" => "A", "Æ" => "A", "Â" => "A", "Å" => "A", "Ǻ" => "A", "Ā" => "A", "א" => "A",
        "Б" => "B", "ב" => "B", "Þ" => "B",
        "Ĉ" => "C", "Ć" => "C", "Ç" => "C", "Ц" => "C", "צ" => "C", "Ċ" => "C", "Č" => "C", "©" => "C", "ץ" => "C",
        "Д" => "D", "Ď" => "D", "Đ" => "D", "ד" => "D", "Ð" => "D",
        "È" => "E", "Ę" => "E", "É" => "E", "Ë" => "E", "Ê" => "E", "Е" => "E", "Ē" => "E", "Ė" => "E", "Ě" => "E", "Ĕ" => "E", "Є" => "E", "Ə" => "E", "ע" => "E",
        "Ф" => "F", "Ƒ" => "F",
        "Ğ" => "G", "Ġ" => "G", "Ģ" => "G", "Ĝ" => "G", "Г" => "G", "ג" => "G", "Ґ" => "G",
        "ח" => "H", "Ħ" => "H", "Х" => "H", "Ĥ" => "H", "ה" => "H",
        "I" => "I", "Ï" => "I", "Î" => "I", "Í" => "I", "Ì" => "I", "Į" => "I", "Ĭ" => "I", "I" => "I", "И" => "I", "Ĩ" => "I", "Ǐ" => "I", "י" => "I", "Ї" => "I", "Ī" => "I", "І" => "I",
        "Й" => "J", "Ĵ" => "J",
        "ĸ" => "K", "כ" => "K", "Ķ" => "K", "К" => "K", "ך" => "K",
        "Ł" => "L", "Ŀ" => "L", "Л" => "L", "Ļ" => "L", "Ĺ" => "L", "Ľ" => "L", "ל" => "L",
        "מ" => "M", "М" => "M", "ם" => "M",
        "Ñ" => "N", "Ń" => "N", "Н" => "N", "Ņ" => "N", "ן" => "N", "Ŋ" => "N", "נ" => "N", "ŉ" => "N", "Ň" => "N",
        "Ø" => "O", "Ó" => "O", "Ò" => "O", "Ô" => "O", "Õ" => "O", "О" => "O", "Ő" => "O", "Ŏ" => "O", "Ō" => "O", "Ǿ" => "O", "Ǒ" => "O", "Ơ" => "O",
        "פ" => "P", "ף" => "P", "П" => "P",
        "ק" => "Q",
        "Ŕ" => "R", "Ř" => "R", "Ŗ" => "R", "ר" => "R", "Р" => "R", "®" => "R",
        "Ş" => "S", "Ś" => "S", "Ș" => "S", "Š" => "S", "С" => "S", "Ŝ" => "S", "ס" => "S",
        "Т" => "T", "Ț" => "T", "ט" => "T", "Ŧ" => "T", "ת" => "T", "Ť" => "T", "Ţ" => "T",
        "Ù" => "U", "Û" => "U", "Ú" => "U", "Ū" => "U", "У" => "U", "Ũ" => "U", "Ư" => "U", "Ǔ" => "U", "Ų" => "U", "Ŭ" => "U", "Ů" => "U", "Ű" => "U", "Ǖ" => "U", "Ǜ" => "U", "Ǚ" => "U", "Ǘ" => "U",
        "В" => "V", "ו" => "V",
        "Ý" => "Y", "Ы" => "Y", "Ŷ" => "Y", "Ÿ" => "Y",
        "Ź" => "Z", "Ž" => "Z", "Ż" => "Z", "З" => "Z", "ז" => "Z",
        "а" => "a", "ă" => "a", "ǎ" => "a", "ą" => "a", "à" => "a", "ã" => "a", "á" => "a", "æ" => "a", "â" => "a", "å" => "a", "ǻ" => "a", "ā" => "a", "א" => "a",
        "б" => "b", "ב" => "b", "þ" => "b",
        "ĉ" => "c", "ć" => "c", "ç" => "c", "ц" => "c", "צ" => "c", "ċ" => "c", "č" => "c", "©" => "c", "ץ" => "c",
        "Ч" => "ch", "ч" => "ch",
        "д" => "d", "ď" => "d", "đ" => "d", "ד" => "d", "ð" => "d",
        "è" => "e", "ę" => "e", "é" => "e", "ë" => "e", "ê" => "e", "е" => "e", "ē" => "e", "ė" => "e", "ě" => "e", "ĕ" => "e", "є" => "e", "ə" => "e", "ע" => "e",
        "ф" => "f", "ƒ" => "f",
        "ğ" => "g", "ġ" => "g", "ģ" => "g", "ĝ" => "g", "г" => "g", "ג" => "g", "ґ" => "g",
        "ח" => "h", "ħ" => "h", "х" => "h", "ĥ" => "h", "ה" => "h",
        "i" => "i", "ï" => "i", "î" => "i", "í" => "i", "ì" => "i", "į" => "i", "ĭ" => "i", "ı" => "i", "и" => "i", "ĩ" => "i", "ǐ" => "i", "י" => "i", "ї" => "i", "ī" => "i", "і" => "i",
        "й" => "j", "Й" => "j", "Ĵ" => "j", "ĵ" => "j",
        "ĸ" => "k", "כ" => "k", "ķ" => "k", "к" => "k", "ך" => "k",
        "ł" => "l", "ŀ" => "l", "л" => "l", "ļ" => "l", "ĺ" => "l", "ľ" => "l", "ל" => "l",
        "מ" => "m", "м" => "m", "ם" => "m",
        "ñ" => "n", "ń" => "n", "н" => "n", "ņ" => "n", "ן" => "n", "ŋ" => "n", "נ" => "n", "ŉ" => "n", "ň" => "n",
        "ø" => "o", "ó" => "o", "ò" => "o", "ô" => "o", "õ" => "o", "о" => "o", "ő" => "o", "ŏ" => "o", "ō" => "o", "ǿ" => "o", "ǒ" => "o", "ơ" => "o",
        "פ" => "p", "ף" => "p", "п" => "p",
        "ק" => "q",
        "ŕ" => "r", "ř" => "r", "ŗ" => "r", "ר" => "r", "р" => "r", "®" => "r",
        "ş" => "s", "ś" => "s", "ș" => "s", "š" => "s", "с" => "s", "ŝ" => "s", "ס" => "s",
        "т" => "t", "ț" => "t", "ט" => "t", "ŧ" => "t", "ת" => "t", "ť" => "t", "ţ" => "t",
        "ù" => "u", "û" => "u", "ú" => "u", "ū" => "u", "у" => "u", "ũ" => "u", "ư" => "u", "ǔ" => "u", "ų" => "u", "ŭ" => "u", "ů" => "u", "ű" => "u", "ǖ" => "u", "ǜ" => "u", "ǚ" => "u", "ǘ" => "u",
        "в" => "v", "ו" => "v",
        "ý" => "y", "ы" => "y", "ŷ" => "y", "ÿ" => "y",
        "ź" => "z", "ž" => "z", "ż" => "z", "з" => "z", "ז" => "z", "ſ" => "z",
        "™" => "tm",
        "@" => "at",
        "Ä" => "ae", "Ǽ" => "ae", "ä" => "ae", "æ" => "ae", "ǽ" => "ae",
        "ĳ" => "ij", "Ĳ" => "ij",
        "я" => "ja", "Я" => "ja",
        "Э" => "je", "э" => "je",
        "ё" => "jo", "Ё" => "jo",
        "ю" => "ju", "Ю" => "ju",
        "œ" => "oe", "Œ" => "oe", "ö" => "oe", "Ö" => "oe",
        "щ" => "sch", "Щ" => "sch",
        "ш" => "sh", "Ш" => "sh",
        "ß" => "ss",
        "Ü" => "ue",
        "Ж" => "zh", "ж" => "zh",
    );
    return strtr($subject, $char_map);
}
echo replace_spec_char("Ăáàâ");
/*<script>function Convert(string){ return string.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); } console.log(Convert("Ë À Ì Â Í Ã Î Ä Ï Ç Ò È Ó É Ô Ê Õ Ö ê Ù ë Ú î Û ï Ü ô Ý õ â ")
const str = "Crème Brul str.normalize('NFD').replace(/[\u0300-\u036f]/g, "") > 'Creme Brulee'</script>*/

function latin_to_normal($string){
//	$latin_string = 'ĀbcĒfghījklmnŌpqrsŪvwxyz';
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

//clean ASSIC VALUE
//$str = "<h1>Hello WorldÆØÅ!</h1>"; & return Hello World
function ($str){
	$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	return $newstr;
}

function ytCode($url){
        $queryString = parse_url($url, PHP_URL_QUERY);
        parse_str($queryString, $params);
        $videoId = $params['v'];
        return $videoId;
    }
    
function googleMapCode($iframeSrc){
   $iframeSrc = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.2960105246116!2d77.26865487473452!3d28.56087268733267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3eb0c085e9f%3A0xbc5cb8fc0f58efa4!2sShipmiles!5e0!3m2!1sen!2sin!4v1685167420018!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
    
    $dom = new DOMDocument();
    $dom->loadHTML($iframeSrc);
    
    $xpath = new DOMXPath($dom);
    $url = $xpath->evaluate("string(//iframe/@src)");
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    $videoId = $params['pb'];
    return $videoId;
 
}
function logs($message, $data=array()){
    $timestamp = date('d-M-Y H:i A');
    $logMessage = "<p style='color: red;'>[" . $timestamp . "] $message</p>";
    if(!empty($data)){
        $logMessage .= "<pre style='color: green;'>".json_encode($data, JSON_PRETTY_PRINT) . "</pre><hr>";
    }else{
        $logMessage .= "<hr>";
    }
    $existingContent = file_get_contents("logs.html");
    $newContent = $logMessage . $existingContent;
    file_put_contents("logs.html", $newContent);
}



?>

