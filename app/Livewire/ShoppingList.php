<?php

namespace App\Livewire;

use Livewire\Component;
use App\Libs\NotionApi;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use FiveamCode\LaravelNotionApi\Notion;
use FiveamCode\LaravelNotionApi\Exceptions\HandlingException;

class ShoppingList extends Component
{
    private $notion;

    public function mount(): void
    {
        $this->initNotion();
    }

    public function initNotion(): void
    {
        try {
            $this->notion = new Notion(config('services.notion.token'));
        } catch (HandlingException $e) {}
    }

    public function fetchItems(): Collection
    {
        $items = collect([]);
        $ttl = now()->addMinutes(5);

        $collection = Cache::remember('shopping-list', $ttl, function () {
            return $this->notion->database(config('services.notion.shopping_db_id', ''))->query();
        });

        foreach ($collection->asCollection() as $item) {
            $items->push([
                'name' => $item->getTitle() ?? 'No name',
                'quantity' => $item->getProperty('Quantity')->asText() ?? 'No quantity',
                'notes' => $item->getProperty('Notes')->asText() ?? 'No notes',
                'completed' => $item->getProperty('Completed')->isChecked() ?? false,
            ]);

        }

        return $items->sortBy('completed');
    }

    public function forceRefresh(): void
    {
        $this->items = collect([]);
        Cache::forget('shopping-list');
        $this->initNotion();
    }

    public function render(): View
    {
        if (!$this->notion) $this->initNotion();

        return view('livewire.shopping-list', [
            'items' => $this->fetchItems(),
        ]);
    }
}
