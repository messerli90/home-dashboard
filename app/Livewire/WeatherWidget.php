<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherWidget extends Component
{
    private $api_key;
    public $city = 'Fort Collins'; // Default city, change as needed
    public $weatherData = [];
    public $icon_path;

    public function mount()
    {
        $this->api_key = config('services.openweather.api_key');
//        $this->initWeatherApi();
//        $this->fetchWeather();
//        $this->weatherData = collect($this->fakeWeather());
//        $this->icon_path = $this->getIcon($this->weatherData['weather'][0]['icon']);

        $this->weatherData = collect($this->fakeWeather());
        $this->icon_path = $this->getIcon($this->weatherData['weather'][0]['icon']);
    }

    public function getIcon($icon): string
    {
        if (empty($icon)) {
            return '';
        }
        return "http://openweathermap.org/img/wn/{$icon}@2x.png";
    }

    public function fakeWeather()
    {
        return [
            'coord' => [
                'lon' => 7.367,
                'lat' => 45.133,
            ],
            'weather' => [
                [
                    'id' => 501,
                    'main' => 'Rain',
                    'description' => 'moderate rain',
                    'icon' => '10d',
                ]
            ],
            'main' => [
                'temp' => 53.2,
                'feels_like' => 282.93,
                'temp_min' => 283.06,
                'temp_max' => 286.82,
                'pressure' => 1021,
                'humidity' => 60,
                'sea_level' => 1021,
                'grnd_level' => 910,
            ],
            'visibility' => 10000,
            'wind' => [
                'speed' => 4.09,
                'deg' => 121,
                'gust' => 3.47,
            ],
            'rain' => [
                '1h' => 2.73,
            ],
            'clouds' => [
                'all' => 83,
            ],
            'dt' => 1726660758,
            'sys' => [
                'type' => 1,
                'id' => 6736,
                'country' => 'IT',
                'sunrise' => 1726636384,
                'sunset' => 1726680975,
            ],
            'timezone' => 7200,
            'id' => 3165523,
            'name' => 'LaPorte',
            'cod' => 200,
        ];
    }

    private function initWeatherApi(): void
    {
        $response = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
            'q' => $this->city,
            'appid' => $this->api_key,
            'units' => 'metric',
        ]);
    }

    private function fetchWeather(): void
    {
        $api_key = config('services.openweather.api_key');
//        ?lat={lat}&lon={lon}&exclude={part}&appid={API key}

        $response = Cache::remember('weather', 60, function () use ($api_key) {
            return Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $this->city,
                'appid' => $api_key,
                'units' => 'imperial',
            ]);
        });

        ray($response);

        if ($response && $response->successful() && !is_int($response->json())) {
            $this->weatherData = collect($response->json());
        }

        ray($this->weatherData->toArray());
    }

    public function render()
    {
        return view('livewire.weather-widget');
    }
}
