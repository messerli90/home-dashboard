@extends('layout')

@section('content')
<div class="relative h-full flex flex-col overflow-hidden" x-data="home">
    <header class="z-20">

    </header>
    <div class="p-8 flex-1 grid grid-cols-6 gap-12 z-20">
        <div class="p-4 flex flex-col col-span-3 space-y-6">
            <div class="flex items-center justify-between">
                <livewire:date-time-widget />
                <livewire:weather-widget />
            </div>

            <div x-ref="main-grid" class="w-full grid grid-cols-2 gap-6">
                <div class="max-h-[400px] overflow-hidden">
                    <livewire:meals-list />
                </div>
                <div>
                    <livewire:todos-list />
                </div>

                <div class="col-start-1 col-span-2">
                    <livewire:shopping-list />
                </div>
            </div>

            <div x-show="showExtraWidgets" x-ref="extra-widgets" class="flex-1 bg-red-200">
                <div class="p-4 bg-neutral-100/50 rounded-lg shadow-md max-h-96">
                    <div class="h-full flex items-center justify-center">
                        <img
                            class="object-cover w-full h-full rounded-lg"
                            src="{{ asset('images/lulu.jpg') }}"
                            alt="Lulu">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-3">
            <livewire:calendar />
        </div>
    </div>

    <livewire:background-image image="https://images.unsplash.com/photo-1512311734173-51a49c854e78?crop=entropy&amp;cs=srgb&amp;fm=jpg&amp;ixid=M3w3MjExMTd8MHwxfHJhbmRvbXx8fHx8fHx8fDE3NDE2NjYyOTZ8&amp;ixlib=rb-4.0.3&amp;q=85"/>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('home', () => ({
                mainGridHeight: 0,
                extraWidgetsHeight: 0,
                showExtraWidgets: false,

                init() {
                    this.updateHeight();


                    if (this.mainGridHeight < 400) {
                        this.showExtraWidgets = true;
                    } else {
                        this.showExtraWidgets = false;
                    }

                    window.addEventListener('resize', () => {
                        this.updateHeight();
                    });
                },
                updateHeight() {
                    this.extraWidgetsHeight = this.$refs['extra-widgets'].clientHeight;
                    this.mainGridHeight = this.$refs['main-grid'].clientHeight;
                },
            }));
        })

    </script>
@endpush
