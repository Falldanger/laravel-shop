<?php


namespace App\Services;


class CurrencyRates
{
    public static function getRates()
    {
        $baseCurrency = CurrencyConversion::getBaseCurrencyCode();
        dd($baseCurrency->code);
    }
}
