<x-filament::page>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-8 gap-3">
            <div class="col-span-5 flex flex-col">
                {{ $this->pricingForm }}
                <hr class="my-4">
                <x-filament::card>
                    @include('checkout.features')
                </x-filament::card>
            </div>
            <div class="col-span-3 flex flex-col">
                <x-filament::card>
                    {{ $this->billingForm }}
                </x-filament::card>
            </div>
        </div>
    </form>
@push('scripts')
<script defer src="{{ Vite::asset('resources/js/checkout.js') }}"></script>
@endpush
</x-filament::page>
