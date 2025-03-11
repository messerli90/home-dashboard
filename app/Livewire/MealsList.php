<?php

namespace App\Livewire;

use Livewire\Component;

class MealsList extends Component
{
    public $items = [];

    public function mount()
    {
        $this->items = collect([
            ['name' => 'Pizza', 'price' => 10],
            ['name' => 'Burger', 'price' => 5],
            ['name' => 'Pasta', 'price' => 8],
            ['name' => 'Salad', 'price' => 6],
        ]);
    }

    public function render()
    {
        return view('livewire.meals-list');
    }
}
