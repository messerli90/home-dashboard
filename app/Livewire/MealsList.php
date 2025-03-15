<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use FiveamCode\LaravelNotionApi\Notion;
use FiveamCode\LaravelNotionApi\Exceptions\NotionException;
use FiveamCode\LaravelNotionApi\Exceptions\HandlingException;

class MealsList extends Component
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
        try {
            $collection = Cache::remember('meals-list', $ttl, function () {
                return $this->notion->database(config('services.notion.meals_db_id', ''))->query();
            });

            foreach ($collection->asCollection() as $item) {
                $items->push([
                    'name' => $item->getTitle() ?? 'Missing Title',
                    'date' => $item->getProperty('Date')?->getStart() ?? null,
                    'notes' => $item->getProperty('Notes')->asText() ?? ''
                ]);

            }
        } catch (NotionException $e) {
            ray($e->getMessage());
            return collect();
        }

        return $items->sortBy('completed');
    }

    public function forceRefresh(): void
    {
        ray('Force refresh meals list');
        $this->items = collect([]);
        Cache::forget('meals-list');
    }

    public function render(): View
    {
        $this->forceRefresh();
        if (!$this->notion) $this->initNotion();

        return view('livewire.meals-list', [
            'items' => $this->fetchItems(),
        ]);
    }
}
