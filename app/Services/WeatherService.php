<?php

namespace App\Services;

use App\Contracts\WeatherRepositoryInterface;

class WeatherService
{
    protected $repository;

    public function __construct(WeatherRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getWeather(string $city, string $units = 'metric'): array
    {
        try {
            $data = $this->repository->fetchWeather($city, $units);
            
            return [
                'status' => 'success',
                'city' => $data['name'],
                'weather' => [
                    'temperature' => $data['main']['temp'],
                    'conditions' => $data['weather'][0]['main'],
                    'description' => $data['weather'][0]['description'],
                    'humidity' => $data['main']['humidity'],
                    'wind_speed' => $data['wind']['speed'],
                    'rain' => $data['rain']['1h'] ?? 0,
                    'icon' => $data['weather'][0]['icon']
                ],
                'timestamp' => $data['dt']
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Failed to fetch weather data'
            ];
        }
    }
}