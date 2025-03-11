<?php

namespace App\Livewire;

use Unsplash\Photo;
use Livewire\Component;
use Unsplash\HttpClient;

class BackgroundImage extends Component
{
    public $image;

    public function mount($image = null)
    {
        $this->initUnsplash();

        $this->image = $image ?? $this->getRandomImage();
    }

    public function getRandomImage()
    {
        $filters = [
//            'username' => 'andy_brunner',
            'query'    => 'coffee',
            'w'        => 100,
            'h'        => 100
        ];
        $photo = Photo::random($filters);

        return $photo->urls['full'];
    }
    public function render()
    {
        return view('livewire.background-image');
    }

    private function initUnsplash()
    {
        HttpClient::init([
            'applicationId' => config('services.unsplash.accessToken'),
            'secret' => config('services.unsplash.secret'),
            'callbackUrl' => config('services.unsplash.callbackUrl'),
            'utmSource' => 'HomeDashboard',
        ]);
    }
}
