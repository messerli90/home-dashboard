<div class="">
    <h2 class="flex text-xl font-semibold text-neutral-900/90">
        <i class="mr-2">🥙</i> Meals
{{--        <button class="ml-auto" wire:click="forceRefresh">r</button>--}}
    </h2>

    <div>
        <ul class="relative mt-2 flex flex-col gap-2 text-lg text-neutral-900/90 ">
            @forelse($items as $item)
                <li class="p-2 max-w-full text-sm bg-neutral-100/50 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <span>{{ $item['name'] }}</span>
                        @isset($item['date'])
                        <span class="ml-4 text-neutral-600/90 text-xs">{{ \Carbon\Carbon::parse($item['date'])->format('D') }}</span>
                        @endisset
                    </div>
                    @isset($item['notes'])
                        <p class="text-xs line-clamp-2">{{ $item['notes'] }}</p>
                    @endisset
                </li>
            @empty
                <li class="p-2 max-w-full text-sm bg-neutral-100/50 rounded-lg shadow-sm">
                    <div class="py-4 flex flex-col items-center justify-center gap-3">
                        <img src="{{ asset('images/undraw_breakfast.svg') }}" alt="No Meals" class="h-16">
                        <p class="text-neutral-700/90">No meals found</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
</div>
