<div class="p-4 bg-neutral-100/50 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-neutral-900/90"><i class="mr-2">{{$icon ?? ''}}</i> {{ $title ?? '-' }}</h2>

    <div>
        <ul class="mt-2 ml-9 flex flex-col flex-wrap text-lg text-neutral-900/90">
            @foreach($items as $item)
                <li class="flex items-center justify-between">
                    <span>{{ $item['name'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
