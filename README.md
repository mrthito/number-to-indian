## Number to Hindi Number, Word or Month Name in Laravel 

![Packagist](https://img.shields.io/packagist/dt/MrThito/number-to-hindi)
[![GitHub stars](https://img.shields.io/github/stars/rakibul-dev/number-to-hindi)](https://github.com/MrThito/number-to-hindi/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/rakibul-dev/number-to-hindi)](https://github.com/MrThito/number-to-hindi/network)
[![GitHub issues](https://img.shields.io/github/issues/rakibul-dev/number-to-hindi)](https://github.com/MrThito/number-to-hindi/issues)
[![GitHub license](https://img.shields.io/github/license/rakibul-dev/number-to-hindi)](https://github.com/MrThito/number-to-hindi/blob/master/LICENSE)
[![MadeWithLaravel.com shield](https://madewithlaravel.com/storage/repo-shields/2818-shield.svg)](https://madewithlaravel.com/p/number-to-hindi/shield-link) | [Get Wordpress Plugin](https://wordpress.org/plugins/number-to-hindi/)


Laravel package to convert English numbers to Hindi number or Hindi text, Hindi month name and Hindi Money Format for Laravel 5.5+. Maximum possible number to covert in Hindi word is 999999999999999
Example,
| Operation | English Input | Hindi Output |
| --- | --- | --- |
| Text (Integer) | 13459 |তেরো হাজার চার শত ঊনষাট|
| Text (Float) | 1345.05 |এক হাজার তিন শত পঁয়তাল্লিশ দশমিক শূন্য পাঁচ|
| Number | 1345.5 |১৩৪৫.৫|
| Text Money Format | 1345.50 |এক হাজার তিন শত পঁয়তাল্লিশ টাকা পঞ্চাশ পয়সা|
| Month | 12 |ডিসেম্বর|
| Comma (Lakh) | 121212121 |১২,১২,১২,১২১|


## Installation

Install the package through [Composer](http://getcomposer.org).
On the command line:

```
composer require MrThito/number-to-hindi

```


## Configuration 
If Laravel > 7, no need to add provider

Add the following to your `providers` array in `config/app.php`:

```php
'providers' => [
    // ...

    MrThito\Hindinumber\NumberToHindiServiceProvider::class,
],
```

## Usage
Here you can see some example of just how simple this package is to use.

```php
use MrThito\Hindinumber\NumberToHindi;

$numto = new NumberToHindi();

// If you want to convert any number (Integer of Float) into Hindi Word
$text = $numto->bnWord(13459);    // Output:  তেরো হাজার চার শত ঊনষাট
$text = $numto->bnWord(1345.05);  // Output:  এক হাজার তিন শত পঁয়তাল্লিশ দশমিক শূন্য পাঁচ


```
### Number to Hindi Word 
Use `bnWord()` to convert any number into hindi word. Example,

```php

// Integer
$text = $numto->bnWord(13459);    // Output:  তেরো হাজার চার শত ঊনষাট

// Float
$text = $numto->bnWord(1345.05);    // Output: এক হাজার তিন শত পঁয়তাল্লিশ দশমিক শূন্য পাঁচ
$text = $numto->bnWord(345675.105); // Output: তিন লক্ষ পঁয়তাল্লিশ হাজার ছয় শত পঁচাত্তর দশমিক এক শূন্য পাঁচ


```

### Number to Hindi Money Format
Use `bnMoney()` to convert any number into hindi money format with 'টাকা' & 'পয়সা'. Example,

```php
$text = $numto->bnMoney(13459);     // Output:  তেরো হাজার চার শত ঊনষাট টাকা
$text = $numto->bnMoney(13459.05);  // Output:  তেরো হাজার চার শত ঊনষাট টাকা পাঁচ পয়সা
$text = $numto->bnMoney(13459.5);   // Output:  তেরো হাজার চার শত ঊনষাট টাকা পঞ্চাশ পয়সা

```

### Number to Hindi Number
Use `bnNum()` to convert any number into hindi number. Example,

```php
$text = $numto->bnNum(13459);    // Output:  ১৩৪৫৯
$text = $numto->bnNum(2334.768); // Output:  ২৩৩৪.৭৬৮

```

### Number to Month Name in Hindi
Use `bnMonth()` to convert any number into hindi number. Input Limit (1-12) Example,

```php
$text = $numto->bnMonth(1);    // Output:  জানুয়ারি 
$text = $numto->bnMonth(4);    // Output:  এপ্রিল

```

### Comma separated number
Use `bnCommaLakh()` to convert any number into hindi number. Example,

```php
$text = $numto->bnCommaLakh(12121212);    // Output:  ১,২১,২১,২১২
```


## License

Number to Hindi is licensed under [The MIT License (MIT)](LICENSE).

