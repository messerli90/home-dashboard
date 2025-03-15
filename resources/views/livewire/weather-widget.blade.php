<div class="py-2 px-8 flex shrink-0 flex-col gap-2 bg-neutral-100/30 rounded-lg shadow-sm">
    <div class="flex flex-wrap items-baseline justify-between gap-12">
        <h2 class="text-xl font-semibold">{{ $weatherData->get('name') }}</h2>
        <p class="text-sm text-neutral-600">{{ $weatherData->get('weather')[0]['description'] }}</p>
    </div>
    <div class="flex items-center justify-end gap-4">
            <img src="{{ $icon_path }}" alt="Weather Icon" class="-m-1 w-16">
        <div>
            <p class="text-4xl">{{ $weatherData->get('main')['temp'] }}&deg;</p>
        </div>
    </div>

    <div class="flex items-center justify-end text-sm space-x-4">
        <span class="inline-flex items-center gap-1 text-neutral-600">
            <svg class="size-5" data-slot="icon" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" fill-rule="evenodd"></path>
            </svg>
            {{ $weatherData->get('main')['temp_min'] }}
        </span>
        <span class="inline-flex items-center gap-1 text-neutral-600">
            <svg class="size-5" data-slot="icon" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" d="M11.47 7.72a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 0 1-1.06-1.06l7.5-7.5Z" fill-rule="evenodd"></path>
            </svg>
            {{ $weatherData->get('main')['temp_max'] }}
        </span>
    </div>
</div>
