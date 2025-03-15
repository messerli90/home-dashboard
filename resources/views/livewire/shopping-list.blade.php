<div class="" wire:poll>
    <h2 class="flex text-xl font-semibold text-neutral-900/90">
        <i class="mr-2">🛒</i> Shopping List
{{--        <button class="ml-auto" wire:click="forceRefresh">r</button>--}}
    </h2>

    <div class="">
        <ul class="relative mt-2 grid grid-cols-3 gap-3 text-lg text-neutral-900/90 ">
            @forelse($items as $item)
                <x-shopping-list-item :item="$item"/>
            @empty
                <li class="p-2 col-span-3 text-sm bg-neutral-100/50 rounded-lg shadow-sm">
                    <div class="py-4 flex flex-col items-center justify-center gap-3">
                        <img src="{{ asset('images/undraw_shopping.svg') }}" alt="No Shopping" class="h-16">
                        <p class="text-neutral-700/90">Shopping list is empty</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
</div>
