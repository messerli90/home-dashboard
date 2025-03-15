<div class="flex-1 flex flex-col" wire:poll.15s>
    <div class="">
        <span class="text-7xl font-bold text-neutral-900/90">
            {{ now()->format('H:i') }}
        </span>
    </div>
    <span class="text-3xl tracking-wider text-neutral-900/70">
        {{ now()->format('l, F d') }}
    </span>
</div>
