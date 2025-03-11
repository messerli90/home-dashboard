<div class="lg:flex lg:h-full lg:flex-col opacity-90">
    <header class="flex items-center justify-between border-b border-gray-200 py-4 px-4">
        <button wire:click="previousMonth" class="text-gray-700 hover:text-gray-900">←</button>
        <h1 class="text-lg font-semibold text-gray-900">
            <time datetime="{{ $currentYear }}-{{ str_pad($currentMonth, 2, '0', STR_PAD_LEFT) }}">
                {{ \Carbon\Carbon::createFromDate($currentYear, $currentMonth, 1)->format('F, Y') }}
            </time>
        </h1>
        <button wire:click="nextMonth" class="text-gray-700 hover:text-gray-900">→</button>
    </header>

    <div class="lg:overflow-hidden lg:shadow-lg lg:rounded-lg">
        <!-- Days of the Week -->
        <div class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold text-gray-700">
            <div class="flex justify-center bg-white py-2">Mon</div>
            <div class="flex justify-center bg-white py-2">Tue</div>
            <div class="flex justify-center bg-white py-2">Wed</div>
            <div class="flex justify-center bg-white py-2">Thu</div>
            <div class="flex justify-center bg-white py-2">Fri</div>
            <div class="flex justify-center bg-white py-2">Sat</div>
            <div class="flex justify-center bg-white py-2">Sun</div>
        </div>

        <!-- Calendar Grid -->
        <div class="grid grid-cols-7 grid-rows-6 gap-px bg-gray-200">
            @foreach ($weeks as $week)
                @foreach ($week as $day)
                    <div class="relative px-3 py-2 min-h-32
                        {{ $day['inCurrentMonth'] ? 'bg-white text-gray-900' : 'bg-gray-50 text-gray-500' }}
                        {{ $day['isToday'] ? 'font-bold text-indigo-600' : '' }}">
                        <time datetime="{{ $day['date']->format('Y-m-d') }}">
                            {{ $day['date']->format('j') }}
                        </time>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
