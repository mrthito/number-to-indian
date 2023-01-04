<?php

namespace MrThito\Hindinumber;

use MrThito\Hindinumber\Exceptions\InvalidNumber;
use MrThito\Hindinumber\Exceptions\InvalidRange;

class ProcessDate
{
    protected  $bn_month = [
        '1' => 'जनवरी',
        '2' => 'फ़रवरी',
        '3' => 'मार्च',
        '4' => 'अप्रैल',
        '5' => 'मई',
        '6' => 'जून',
        '7' => 'जुलाई',
        '8' => 'अगस्त',
        '9' => 'सितंबर',
        '10' => 'अक्टूबर',
        '11' => 'नवंबर',
        '12' => 'दिसंबर'
    ];

    protected  $numbers = [
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


    public function bnMonth($number)
    {
        $this->isValid($number);

        if ($number >= 1 && $number <= 12) {
            return $this->bn_month[(int)$number];
        }

        throw InvalidRange::message(12);
    }
}
