<li class="p-2 max-w-full bg-neutral-100/50 rounded-lg shadow-sm text-sm">
    <div class="flex items-center">
        @if($item['completed'])
            <span class="mr-1 w-5 h-5 rounded-full bg-green-600/80 text-green-50/90">
                <svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5"
                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        @endif
        <span class="font-semibold">{{ $item['name'] }}</span>
        <span class="ml-auto text-neutral-600/90 text-xs">{{ $item['quantity'] }}</span>
    </div>
    @isset($item['notes'])
        <p class="mt-1 pl-2 text-xs line-clamp-2">{{ $item['notes'] }}</p>
    @endisset
</li>
