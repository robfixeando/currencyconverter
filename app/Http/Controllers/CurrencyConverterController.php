<?php

namespace App\Http\Controllers;

use App\Validators\CurrencyConverterValidator;
use App\Dtos\CurrencyConverterDTO;
use App\Services\CurrencyConverterService;

class CurrencyConverterController
{
    public function getCotization(CurrencyConverterValidator $request)
    {
        $currencyConverterDTO = new CurrencyConverterDTO(
            $request['amount'],
            $request['from_currency'],
            $request['to_currency']
        );

        $currencyConverterService = new CurrencyConverterService();
        $result = $currencyConverterService->getCotization($currencyConverterDTO);

        if($result) {
            return response()->json([
                'success' => true,
                'data' => $result . " " . $request['to_currency'],
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => "Se ha producido un error",
            ], 400);
        }

        return $result;
    }
}
