<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $apiKey = '49c2f41255cbcebecfbd60fddc265f37'; // your OpenWeatherMap API key
        $city = 'Nairobi';
        $units = 'metric'; // for Celsius
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units={$units}";

        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Failed to fetch weather data'], 500);
        }
    }
}
