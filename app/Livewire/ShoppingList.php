<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class ShoppingList extends Component
{
    public $items = [];

    public function mount(): void
    {
        $this->items = collect([
            ['name' => 'Milk', 'quantity' => 1],
            ['name' => 'Bread', 'quantity' => 2],
            ['name' => 'Eggs', 'quantity' => 12],
            ['name' => 'Butter', 'quantity' => 1],
            ['name' => 'Cheese', 'quantity' => 1],
            ['name' => 'Coffee', 'quantity' => 1],
            ['name' => 'Tea', 'quantity' => 1],
            ['name' => 'Sugar', 'quantity' => 1],
            ['name' => 'Salt', 'quantity' => 1],
            ['name' => 'Pepper', 'quantity' => 1],
        ]);
    }

    public function render(): View
    {
        return view('livewire.shopping-list');
    }
}
