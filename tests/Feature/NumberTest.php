<?php

namespace Tests\Feature;

use MrThito\Hindinumber\Facades\NumberToHindi;
use Tests\TestCase;

class NumberTest extends TestCase
{
    /**
     * Can convert number to hindi word correctly
     *
     * @return void
     */
    public function test_can_convert_number_to_hindi_word_correclty()
    {
        $word = NumberToHindi::bnWord(13459);
    }
}
