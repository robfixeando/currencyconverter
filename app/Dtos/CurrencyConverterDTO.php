<?php

namespace App\Dtos;

class CurrencyConverterDTO
{
    public $amount;
    public $from_currency;
    public $to_currency;

    public function __construct($amount, $from_currency, $to_currency)
    {
        $this->amount = $amount;
        $this->from_currency = $from_currency;
        $this->to_currency = $to_currency;
    }
}
