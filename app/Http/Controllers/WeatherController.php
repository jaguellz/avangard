<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function weather()
    {
        $response = Http::withHeaders(['X-Yandex-API-Key' => 'b96f7bce-41e3-43fb-b1b5-8f291e2e71bc'])
            ->get('https://api.weather.yandex.ru/v2/informers',
                [
                    'lat' =>53.243562,
                    'lon' => 34.363425,
                ]
            );
        return view('weather', ['temp' => $response->collect('fact')['temp']]);
    }
}
