<?php

namespace MrThito\Hindinumber\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MrThito\Hindinumber\NumberToHindi
 */

class NumberToHindi extends Facade
{
	protected static function getFacadeAccessor(): string
    {
        return 'hindi-number';
    }
}