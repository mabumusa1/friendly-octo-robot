<x-filament::page>
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
                    <div class="flex flex-col">
                        <h1 class="text-gray-800 text-xl font-medium mb-2">{{ __('Order Details') }}</h1>
                    </div>
                    <hr class="my-4">
                     <div class="flex justify-between items-center">
                        <span class="font-medium text-base">{{ __(':noContacts Contacts / :PlanName', ['noContacts' => $this->contacts, 'planName' => $this->period]) }}</span><span class="text-base font-medium">{{ $this->price }}</span>
                      </div>
                    <hr class="my-4">
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 hidden" role="alert" id="stripe-error-div">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">{{ __("Error") }}</span>
                        <div>
                          <span class="font-medium" id="stripe-error-text"></span>
                          <p class="font-small italic" id="stripe-error-details"></p>
                        </div>
                      </div>
                    <div class="space-y-4">
                        <label class="block text-sm font-medium mb-1" for="card-nr">{{ __('Account Name') }} <span class="text-red-500">*</span></label>
                        <input required type="text" wire:ignore id="name" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full">
                    </div>

                    <div class="space-y-4">
                        <label class="block text-sm font-medium mb-1" for="card-nr">{{ __('Card Number') }} <span class="text-red-500">*</span></label>
                        <div wire:ignore id="card-element" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full"></div>
                    </div>

                    <button wire:ignore id="card-button" data-secret="{{ $intent->client_secret }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                        {{ __('Place Order') }}
                    </button>
                </x-filament::card>
            </div>
        </div>
</x-filament::page>

@push('scripts')
<script>
const stripe = Stripe("{{ env('STRIPE_KEY') }}");
const cardButton = document.getElementById("card-button");
const clientSecret = cardButton.dataset.secret;
const elements = stripe.elements();
const cardElement = elements.create("card", {
    iconStyle: "solid",
    style: {
        base: {
            fontSize: "16px",
            fontSmoothing: "antialiased",
            fontWeight: "400"
        }
    }
});


cardElement.mount("#card-element");
cardButton.addEventListener("click", async function(e) {
    e.preventDefault();

    function displayError(message, details) {
        const stripeErrorDiv = document.getElementById("stripe-error-div");
        const stripeErrorText = document.getElementById("stripe-error-text");
        const stripeErrorDetails = document.getElementById("stripe-error-details");
        stripeErrorDiv.classList.remove("hidden");
        stripeErrorText.innerHTML = message;
        stripeErrorDetails.innerHTML = details;

    }

    const accoutName = document.getElementById("name").value
    if(accoutName == ""){
        displayError("{{ __('Account name is required') }}");
        return;
    }

    const {
        setupIntent,
        error
    } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: cardElement
            }
        }
    );
    if (error) {
        displayError(error.message);
    } else {
        fetch("{{ route('addPaymentMethod') }}", {
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "X-CSRF-Token": document.querySelector("meta[name='csrf-token']").content
            },
            method: "POST",
            body: JSON.stringify({
                name: accoutName,
                payment_method: setupIntent.payment_method,
                planId: "{{ $this->planId }}"
            })
        }).then(response => {
            if (response.ok) {
                response.json().then(data => {
                    window.location.href = data.redirect;
                });
            } else {
                response.json().then(data => {
                    displayError("{{ __('An error happened while processing your payment, please contact support') }}" , data.message);
                });


            }
        })

    }

});
</script>
@endpush
