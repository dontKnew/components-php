<?php
function number_to_roman(string $num)
{
    static $map = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1,
    ];

    $num = (int) $num;

    if ($num < 1 || $num > 3999) {
        return null;
    }

    $result = '';

    foreach ($map as $roman => $arabic) {
        $repeat = (int) floor($num / $arabic);
        $result .= str_repeat($roman, $repeat);
        $num %= $arabic;
    }

    return $result;
}

function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}
echo ucwords(convertNumberToWord(57589));
//$f = new NumberFormatter("en",NumberFormatter::SPELLOUT);
//echo $f->format(1250);

/* start  number to currency*/
//extension=intl must be enable to use this function in php.ini file

function number_to_currency(float $num, string $currency, ?string $locale = null, int $fraction = 0): string
{
    return format_number($num, 1, $locale, [
        'type'     => NumberFormatter::CURRENCY,
        'currency' => $currency,
        'fraction' => $fraction,
    ]);
}
function format_number(float $num, int $precision = 1, ?string $locale = null, array $options = []): string
{
    // If locale is not passed, get from the default locale that is set from our config file
    // or set by HTTP content negotiation.
    $locale = Locale::getDefault();

    // Type can be any of the NumberFormatter options, but provide a default.
    $type = (int) ($options['type'] ?? NumberFormatter::DECIMAL);

    $formatter = new NumberFormatter($locale, $type);

    // Try to format it per the locale
    if ($type === NumberFormatter::CURRENCY) {
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $options['fraction']);
        $output = $formatter->formatCurrency($num, $options['currency']);
    } else {
        // In order to specify a precision, we'll have to modify
        // the pattern used by NumberFormatter.
        $pattern = '#,##0.' . str_repeat('#', $precision);

        $formatter->setPattern($pattern);
        $output = $formatter->format($num);
    }

    // This might lead a trailing period if $precision == 0
    $output = trim($output, '. ');

    if (intl_is_failure($formatter->getErrorCode())) {
        throw new BadFunctionCallException($formatter->getErrorMessage());
    }

    // Add on any before/after text.
    if (isset($options['before']) && is_string($options['before'])) {
        $output = $options['before'] . $output;
    }

    if (isset($options['after']) && is_string($options['after'])) {
        $output .= $options['after'];
    }

    return $output;
}
echo number_to_currency(1234.56, 'USD', 'en_US', 2);  // Returns $1,234.56

/* end  number to currency */

