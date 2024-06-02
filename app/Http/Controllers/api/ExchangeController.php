<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExchageRequest;
use App\Http\Services\CurrencyExchangeService;

class ExchangeController extends Controller
{
    // DI
    public $currencyExchangeService;

    public function __construct(CurrencyExchangeService $currencyExchangeService)
    {
        $this->currencyExchangeService = $currencyExchangeService;
    }

    public function exchange(ExchageRequest $request)
    {
        try {
            $currencies = $this->currencyExchangeService->getCrrencies()["currencies"];

            $result = number_format($currencies[$request->source][$request->target] * str_replace(",", "", $request->amount), 2);

            return response()->json([
                "msg"    => "success",
                "amount" => $result
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "msg"  => "fail",
                "data" => $th->getMessage()
            ]);
        }
    }
}
