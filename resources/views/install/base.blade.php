<x-filament::page
    :widget-data="['record' => $record]"
    :class="\Illuminate\Support\Arr::toCssClasses([
        'filament-resources-view-record-page',
        'filament-resources-' . str_replace('/', '-', $this->getResource()::getSlug()),
        'filament-resources-record-' . $record->getKey(),
    ])"
>

<div class="grid grid-cols-8 gap-3">
    <div class="col-span-6 flex flex-col">
        @include('install.details')
    </div>
    <div class="col-span-2 flex flex-col">
        @yield('sidebar')
    </div>
</div>
</x-filament::page>
