<?php

namespace MrThito\Hindinumber;

use MrThito\Hindinumber\Exceptions\InvalidNumber;
use MrThito\Hindinumber\Exceptions\InvalidRange;

class ProcessNumber
{
    protected $words = [
        '',
        'एक',
        'दो',
        'तीन',
        'चार',
        'पंज',
        'छह',
        'सात',
        'आठ',
        'नहीं',
        'दस',
        'ग्यारह',
        'बारह',
        'तेरह',
        'चौदह',
        'पंद्रह',
        'सोलह',
        'सत्रह',
        'अठारह',
        'उन्नीस',
        'बीस',
        'इक्कीस',
        'बाईस',
        'तेईस',
        'चौबीस',
        'पच्चीस',
        'छब्बीस',
        'सत्ताईस',
        'अट्ठाईस',
        'उनतालीस',
        'तीस',
        'इकतीस',
        'बत्तीस',
        'तैंतीस',
        'चौंतीस',
        'पैंतीस',
        'छत्तीस',
        'सैंतीस',
        'अड़तीस',
        'उनचास',
        'चालीस',
        'इकतालीस',
        'बयालीस',
        'तैंतालीस',
        'चवालीस',
        'पैंतालीस',
        'छियालीस',
        'सैंतालीस',
        'अड़तालीस',
        'उनसठ',
        'पचास',
        'इक्यावन',
        'बावन',
        'तिरपन',
        'चौवन',
        'पचास',
        'छप्पन',
        'सत्तावन',
        'पचास के करीब',
        'उनहत्तर',
        'साठ',
        'इकसठ',
        'बासठ',
        'तिरसठ',
        'चौंसठ',
        'पैंसठ',
        'छियासठ',
        'सड़सठ',
        'अड़सठ',
        'उनहत्तर',
        'सत्तर',
        'इकहत्तर',
        'बहत्तर',
        'सत्तर-तीस',
        'चौहत्तर',
        'पचहत्तर',
        'छिहत्तर',
        'सतहत्तर',
        'अठहत्तर',
        'नवासी',
        'अस्सी',
        'एकशी',
        'बिराशी',
        'तिराशी',
        'चौरासी',
        'पचासी',
        'छियासी',
        'सत्तासी',
        'अट्ठासी',
        'निन्यानवे',
        'नब्बे',
        'इक्यानबे',
        'बयान्वे',
        'तिरानवे',
        'चौरानवे',
        'पंचानबे',
        'छियानबे',
        'सत्तानवे',
        'अट्ठानबे',
        'निन्यानवे'
    ];

    protected $bn_num = [
        'शून्य',
        'एक',
        'दो',
        'तीन',
        'चार',
        'पंज',
        'छह',
        'सात',
        'आठ',
        'नहीं'
    ];

    protected $numbers = [
        '०',
        '१',
        '२',
        '३',
        '४',
        '५',
        '६',
        '७',
        '८',
        '९'
    ];


    public function isValid($number)
    {
        if (!is_numeric($number)) {
            throw InvalidNumber::message();
        }

        if ($number > 999999999999999 || strpos($number, 'E') !== false) {
            throw InvalidRange::message();
        }
    }

    public function bnNum($number)
    {
        $this->isValid($number);

        return strtr($number, $this->numbers);
    }


    public function bnWord($number)
    {
        $valid = $this->isValid($number);

        if ($number == 0) {
            return 'शून्य';
        }

        if (is_float($number)) {
            return $this->convertFloatNumberToWord($number);
        }

        return $this->toWord($number);
    }

    public function bnMoney($number)
    {
        $this->isValid($number);

        if ($number == 0) {
            return 'शून्य पैसे';
        }

        if (is_float($number)) {
            return $this->convertFloatNumberToMoneyFormat($number);
        }

        return $this->toWord($number) . ' पैसे ';
    }

    public function bnCommaLakh($number)
    {
        $this->isValid($number);

        $n = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $number);

        return strtr($n, $this->numbers);
    }

    protected function toWord($num)
    {
        $text = '';
        $crore = (int) ($num / 10000000);
        if ($crore != 0) {
            if ($crore > 99) {
                $text .= $this->bnWord($crore) . ' करोड़ ';
            } else {
                $text .= $this->words[$crore] . ' करोड़ ';
            }
        }

        $crore_div = $num % 10000000;

        $lakh = (int) ($crore_div / 100000);
        if ($lakh > 0) {
            $text .= $this->words[$lakh] . ' लाख ';
        }

        $lakh_div = $crore_div % 100000;

        $thousand = (int) ($lakh_div / 1000);
        if ($thousand > 0) {
            $text .= $this->words[$thousand] . ' हजार ';
        }

        $thousand_div = $lakh_div % 1000;

        $hundred = (int) ($thousand_div / 100);
        if ($hundred > 0) {
            $text .= $this->words[$hundred] . ' सौ ';
        }

        $hundred_div = (int) ($thousand_div % 100);
        if ($hundred_div > 0) {
            $text .= $this->words[$hundred_div];
        }

        return $text;
    }

    protected function toDecimalWord($num)
    {
        $text = '';
        $decimalParts = str_split($num);
        foreach ($decimalParts as $key => $decimalPart) {
            $text .= $this->bn_num[$decimalPart] . ' ';
        }

        return $text;
    }

    /**
     * Convert float number to text
     * 
     */
    private function convertFloatNumberToWord($number)
    {
        $decimalPart = explode(".", $number);
        $text = $this->toWord($decimalPart[0]);
        if (isset($decimalPart[1])) {
            $text .= ' दशमलव ' . $this->toDecimalWord((string)$decimalPart[1]);
        }

        return $text;
    }

    /**
     * Convert float number to money format
     * 
     */
    private function convertFloatNumberToMoneyFormat($number)
    {
        $money  = number_format((float)$number, 2, '.', '');
        $decimalPart = explode(".", $money);
        $text = $this->toWord($decimalPart[0]) . ' पैसे ';
        if (isset($decimalPart[1])) {
            $text .= $this->words[(int)$decimalPart[1]] . ' पैसा';
        }

        return $text;
    }
}
