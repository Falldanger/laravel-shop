<?php


namespace App\ViewComposers;


use App\Services\CurrencyConversion;
use Illuminate\View\View;

class CurrenciesComposer
{
    public function compose(View $view)
    {
        $currencySymbol = CurrencyConversion::getCurrencySymbol();
        $currencies = CurrencyConversion::getCurrencies();

        $view->with('currencySymbol', $currencySymbol);
        $view->with('currencies', $currencies);
    }
}
