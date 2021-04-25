<?php


namespace App\Services;


class CurrencyRates
{
    public static function getRates()
    {
        $baseCurrency = CurrencyConversion::getBaseCurrency();
        $url = config('currency_rates.api_url');
        dd($url);
    }
}
