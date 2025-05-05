<?php

namespace App\Repositories;

use App\Contracts\WeatherRepositoryInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherRepository implements WeatherRepositoryInterface
{
    public function fetchWeather(string $city, string $units): array
    {
        $apiKey = config('services.weather.key');
        
        try {
            $response = Http::timeout(3)->get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'units' => $units,
                'appid' => $apiKey
            ]);

            if ($response->failed()) {
                throw new \Exception("API Error: " . $response->body());
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error("WeatherRepository Error: " . $e->getMessage());
            throw new \Exception("Could not retrieve weather data");
        }
    }
}