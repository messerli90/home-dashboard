<?php

namespace App\Livewire;

use Livewire\Component;
use App\Libs\NotionApi;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use FiveamCode\LaravelNotionApi\Notion;
use FiveamCode\LaravelNotionApi\Exceptions\NotionException;
use FiveamCode\LaravelNotionApi\Exceptions\HandlingException;

class TodosList extends Component
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
            $collection = Cache::remember('todos-list', $ttl, function () {
                return $this->notion->database(config('services.notion.todos_db_id', ''))->query();
            });


            foreach ($collection->asCollection() as $item) {
                $items->push([
                    'name' => $item->getTitle() ?? 'No name',
                    'status' => $item->getProperty('Status')->getContent()['name'] ?? false,
                ]);

            }
        } catch (NotionException $e) {}

        // Only show "In Progress" items
        $items = $items->filter(function ($item) {
            return $item['status'] === 'In progress';
        });

        return $items->sortBy('status');
    }

    public function forceRefresh(): void
    {
        $this->items = collect([]);
        Cache::forget('todos-list');
        $this->initNotion();
    }

    public function render(): View
    {
        if (!$this->notion) $this->initNotion();

        return view('livewire.todos-list', [
            'items' => $this->fetchItems() ?? collect([]),
        ]);
    }
}
