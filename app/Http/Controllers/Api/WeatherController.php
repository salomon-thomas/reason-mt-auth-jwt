<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Rules\Latitude;
use App\Rules\Longitude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $validatedData = $request->validate([
            'latitude' => ['required', new Latitude],
            'longitude' => ['required', new Longitude],
        ]);
        // Make a request to the weather API
        $response = Http::get('http://api.weatherapi.com/v1/current.json?key=b30d96cd70be4e8cb82110310233006&q='.$validatedData['latitude'].','.$validatedData['longitude'].'&aqi=no');

        return response()->json($response->json(), $response->status());
    }
}
