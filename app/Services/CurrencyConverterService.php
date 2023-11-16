<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Dtos\CurrencyConverterDTO;

class CurrencyConverterService
{
    protected $apiUrl = 'http://api.currencylayer.com/convert';
    protected $access_key = '14c4d8edade190243ada67de6dbdb8f4';

    public function getCotization(CurrencyConverterDTO $dto): float
    {
        try {
            $client = new Client();
            $response = $client->get($this->apiUrl, [
                'query' => [
                    'access_key' => $this->access_key,
                    'from' => $dto->from_currency,
                    'to' => $dto->to_currency,
                    'amount' => $dto->amount,
                ],
            ]);
            $response = $response->getBody()->getContents();
            $result = json_decode($response, true)["result"];
            return round($result, 2);
        } catch (\Exception $e) {
            /* en este caso regreso false, pero en realidad debería loguear el error y regresar
            por ejemplo con 
            return $e->getMessage();
            un mensaje que permita tener una idea de lo que haya sucedido
            */
            return false;
        }
    }
}
