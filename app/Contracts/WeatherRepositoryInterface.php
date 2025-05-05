<?php

namespace App\Contracts;

interface WeatherRepositoryInterface
{
    public function fetchWeather(string $city, string $units): array;
}